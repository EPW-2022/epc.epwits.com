<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz_answer;
use App\Models\Quiz_attempt;
use App\Models\Quiz_timer;
use App\Models\Team;
use App\Models\Quiz_token;
use App\Models\Quiz_tryout;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function getSession(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required|numeric'
        ]);

        $active_token = Quiz_token::latest()->first();
        $active_timer = Quiz_timer::latest()->first();

        $valid_token = Carbon::parse($active_token->date . ' ' . $active_token->time);
        $valid_timer = Carbon::parse($active_timer->date . ' ' . $active_timer->time);

        $expired = $valid_token->timestamp - Carbon::now()->timestamp;
        $notime = $valid_timer->timestamp - Carbon::now()->timestamp;

        if (Quiz_attempt::firstWhere('user_id', auth()->user()->id)) {
            return back()->with('message', 'Already Attempt');
        } else {
            if ($expired > 0 && $notime > 0) {
                if ($active_token['token'] == $validated['token']) {
                    $token = Str::random(60);
                    $request->session()->put('getSession', $token);

                    $saveAnswer = array_fill(1, Quiz_tryout::all()->count(), NULL);
                    $request->session()->put('saveAnswer', $saveAnswer);
                    $flagged = array_fill(1, Quiz_tryout::all()->count(), NULL);
                    $request->session()->put('flagged', $flagged);

                    Quiz_attempt::create([
                        'user_id'       => auth()->user()->id,
                        'name'          => auth()->user()->name,
                        'team_number'   => auth()->user()->team->team_number,
                        'token'         => $validated['token'],
                        'attempt_at'    => Carbon::now(),
                        'session'       => $token
                    ]);
                    return redirect("quiz/$token/1");
                } else {
                    return back()->with('message', 'Wrong Token');
                }
            } else {
                return back()->with('message', 'Wrong Expired');
            }
        }
    }

    public function startQuiz(Request $request, Quiz_attempt $quiz_attempt, Quiz_tryout $quiz_tryout)
    {
        if ($request->session()->get('getSession') === $quiz_attempt->session) {
            return view('penyisihan.quiz', [
                'title'     => 'Penyisihan',
                'questions' => Quiz_tryout::all(),
                'quiz'      => $quiz_tryout,
                'answer'    => $request->session()->get('saveAnswer'),
                'flagged'   => $request->session()->get('flagged'),
                'timer'     => Quiz_timer::latest()->first()
            ]);
        } else {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('message', 'Quiz attempt');
        }
    }

    public function saveAnswer(Request $request, Quiz_tryout $quiz_tryout)
    {
        $saveAnswer = json_decode(json_encode($request->session()->get('saveAnswer')), true);
        $ans = [$quiz_tryout->number => $request->answer];

        $saveAnswer = array_replace($saveAnswer, $ans);
        $request->session()->put('saveAnswer', $saveAnswer);
    }

    public function removeAnswer(Request $request, Quiz_tryout $quiz_tryout)
    {
        $answer = json_decode(json_encode($request->session()->get('saveAnswer')), true);
        $checked = $request->session()->get('saveAnswer')[$quiz_tryout->number];
        $ans = [$quiz_tryout->number => NULL];

        $answer = array_replace($answer, $ans);
        $request->session()->put('saveAnswer', $answer);
        return $checked;
    }

    public function addflagged(Request $request, Quiz_tryout $quiz_tryout)
    {
        $flagged = json_decode(json_encode($request->session()->get('flagged')), true);
        $ans = [$quiz_tryout->number => TRUE];

        $flagged = array_replace($flagged, $ans);
        $request->session()->put('flagged', $flagged);

        return response()->json('Sukses ditandai');
    }

    public function removeflagged(Request $request, Quiz_tryout $quiz_tryout)
    {
        $flagged = json_decode(json_encode($request->session()->get('flagged')), true);
        $ans = [$quiz_tryout->number => NULL];

        $flagged = array_replace($flagged, $ans);
        $request->session()->put('flagged', $flagged);

        return response()->json('Sukses dihapus');
    }

    public function submission(Request $request, Quiz_attempt $quiz_attempt)
    {
        if ($request->session()->get('getSession') === $quiz_attempt->session) {
            return view('penyisihan.submission', [
                'title'     => 'Penyisihan',
                'questions' => Quiz_tryout::all(),
                'answer'    => $request->session()->get('saveAnswer'),
                'flagged'   => $request->session()->get('flagged'),
                'timer'     => Quiz_timer::latest()->first()
            ]);
        } else {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('message', 'Quiz attempt');
        }
    }
    public function endSession(Request $request, Quiz_attempt $quiz_attempt)
    {
        $answer = $request->session()->get('saveAnswer');
        $score = 0;
        $true = 0;
        $false = 0;
        $answer_array = [];

        foreach ($answer as $key => $ans) {
            $quiz = Quiz_tryout::firstWhere('number', $key);
            if ($ans == $quiz->true_answer) {
                $score = $score + intval($quiz->score);
                $true++;
            } else {
                $false++;
            }

            if ($ans == NULL) {
                $answer_array[] = '-';
            } else {
                $answer_array[] = $ans;
            }
        }

        $data = [
            'user_id'       => $quiz_attempt->user_id,
            'name'          => $quiz_attempt->name,
            'team_number'   => $quiz_attempt->team_number,
            'answer_array'  => implode(";", $answer_array),
            'score'         => $score,
            'true'          => $true,
            'false'         => $false,
            'submitted_at'  => Carbon::now()
        ];
        Quiz_answer::create($data);

        $request->session()->remove('getSession');

        $request->session()->remove('saveAnswer');

        $request->session()->remove('flagged');

        $request->session()->regenerate();

        return redirect('/')->with('message', 'Quiz Finished');
    }
}
