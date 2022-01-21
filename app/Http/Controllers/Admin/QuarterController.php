<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quarter_answer;
use App\Models\Quarter_attempt;
use App\Models\Quarter_tryout;
use App\Models\Quiz_timer;
use App\Models\Quiz_token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuarterController extends Controller
{
    public function quarterSession(Request $request)
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

        if (Quarter_attempt::firstWhere('user_id', auth()->user()->id)) {
            return back()->with('message', 'Already Attempt');
        } else {
            if ($expired > 0 && $notime > 0) {
                if ($active_token['token'] == $validated['token']) {
                    $token = Str::random(60);
                    $request->session()->put('getSession', $token);
                    $saveAnswer = array_fill(1, Quarter_tryout::all()->count(), NULL);
                    $request->session()->put('saveAnswer', $saveAnswer);
                    $flagged = array_fill(1, Quarter_tryout::all()->count(), NULL);
                    $request->session()->put('flagged', $flagged);

                    Quarter_attempt::create([
                        'user_id'       => auth()->user()->id,
                        'name'          => auth()->user()->name,
                        'team_number'   => auth()->user()->team->team_number,
                        'token'         => $validated['token'],
                        'attempt_at'    => Carbon::now(),
                        'session'       => $token
                    ]);
                    return redirect("quarter/$token/1");
                } else {
                    return back()->with('message', 'Wrong Token');
                }
            } else {
                return back()->with('message', 'Wrong Expired');
            }
        }
    }

    public function startQuiz(Request $request, Quarter_attempt $quarter_attempt, Quarter_tryout $quarter_tryout)
    {
        if ($request->session()->get('getSession') === $quarter_attempt->session) {
            return view('perempat.quarter', [
                'title'     => 'Penyisihan',
                'questions' => Quarter_tryout::all(),
                'quiz'      => $quarter_tryout,
                'answer'    => $request->session()->get('saveAnswer'),
                'answered'  => Quarter_answer::where('user_id', auth()->user()->id)->firstWhere('number', $quarter_tryout->number),
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

    public function uploadAnswer(Request $request, Quarter_tryout $quarter_tryout)
    {
        $validated = $request->validate([
            'answer'    => 'required|mimes:pdf,jpg,jpeg,png|max:1024'
        ]);

        if ($request->hasFile('answer')) {
            $lastanswer = Quarter_answer::where('user_id', auth()->user()->id)->firstWhere('number', $quarter_tryout->number);
            if ($lastanswer) {
                unlink(public_path('files/perempat/' . $lastanswer->answer_file));
                $lastanswer->delete();
            }
            $fileName = auth()->user()->team->team_number . '_Answer_' . $quarter_tryout->number . '_' . Carbon::now()->format('Y-m-d H.i.s') . '.' . $validated['answer']->extension();
            $request->answer->move(public_path('files/perempat'), $fileName);

            $saveAnswer = json_decode(json_encode($request->session()->get('saveAnswer')), true);
            $ans = [$quarter_tryout->number => $fileName];

            $saveAnswer = array_replace($saveAnswer, $ans);
            $request->session()->put('saveAnswer', $saveAnswer);

            Quarter_answer::create([
                'user_id'       => auth()->user()->id,
                'name'          => auth()->user()->name,
                'team_number'   => auth()->user()->team->team_number,
                'number'        => $quarter_tryout->number,
                'answer_file'   => $fileName,
            ]);
            return back()->with('message', 'Answer Uploaded');
        }
    }

    public function deleteAnswer(Request $request, Quarter_answer $quarter_answer, Quarter_tryout $quarter_tryout)
    {
        $flagged = json_decode(json_encode($request->session()->get('saveAnswer')), true);
        $ans = [$quarter_tryout->number => FALSE];

        $flagged = array_replace($flagged, $ans);
        $request->session()->put('saveAnswer', $flagged);

        unlink(public_path('files/perempat/' . $quarter_answer->answer_file));
        $quarter_answer->delete();

        return back()->with('message', 'Answer Deleted');
    }

    public function submission(Request $request, Quarter_attempt $quarter_attempt)
    {
        if ($request->session()->get('getSession') === $quarter_attempt->session) {
            return view('perempat.submission', [
                'title'     => 'Penyisihan',
                'questions' => Quarter_tryout::all(),
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

    public function endSession(Request $request, Quarter_attempt $quarter_attempt)
    {
        $quarter_attempt->update([
            'finished_at'   => Carbon::now()
        ]);

        $request->session()->remove('getSession');

        $request->session()->remove('saveAnswer');

        $request->session()->remove('flagged');

        $request->session()->regenerate();

        return redirect('/')->with('message', 'Quiz Finished');
    }
}
