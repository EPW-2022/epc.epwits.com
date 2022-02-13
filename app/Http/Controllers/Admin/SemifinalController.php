<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz_timer;
use App\Models\Quiz_token;
use App\Models\Semifinal_answer;
use App\Models\Semifinal_attend;
use App\Models\Semifinal_rank;
use App\Models\Semifinal_tryout;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class SemifinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.semifinal.index', [
            'title' => 'Daftar Soal Semifinal',
            'questions' => Semifinal_tryout::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semifinal_tryout  $semifinal_tryout
     * @return \Illuminate\Http\Response
     */
    public function show(Semifinal_tryout $semifinal_tryout)
    {
        return view('admin.semifinal.show', [
            'title' => 'Soal No ' . $semifinal_tryout->number,
            'question' => $semifinal_tryout
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semifinal_tryout  $semifinal_tryout
     * @return \Illuminate\Http\Response
     */
    public function edit(Semifinal_tryout $semifinal_tryout)
    {
        return view('admin.semifinal.edit', [
            'title'     => 'Soal No ' . $semifinal_tryout->number,
            'tryout'    => $semifinal_tryout
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semifinal_tryout  $semifinal_tryout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semifinal_tryout $semifinal_tryout)
    {
        $validated = $request->validate([
            'question'      => 'required'
        ]);

        // Question Form
        $storage = "img/semifinal";
        $question = new \DOMDocument();
        libxml_use_internal_errors(true);
        $question->loadHTML($request->question, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $question->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $group);
                $mimetype = $group['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath = ("$storage/$fileNameContentRand.$mimetype");
                $image = Image::make($src)
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img fluid w-auto');
            }
        }
        $validated['question'] = $question->saveHTML();

        $semifinal_tryout->update($validated);

        return redirect('/admin/semifinal')->with('message', "Question Updated");
    }

    public function platform()
    {
        return view('admin.semifinal.platform', [
            'questions'     => Semifinal_tryout::all(),
            'users'         => Semifinal_rank::orderBy('score', 'DESC')->get()
        ]);
    }

    public function semifinalAttend(Request $request, Team $team)
    {
        $validated = $request->validate([
            'token' => 'required|numeric'
        ]);

        $active_token = Quiz_token::latest()->first();

        $valid_token = Carbon::parse($active_token->date . ' ' . $active_token->time);

        $expired = $valid_token->timestamp - Carbon::now()->timestamp;

        if ($expired > 0) {
            if ($active_token['token'] == $validated['token']) {
                Semifinal_attend::create([
                    'user_id'       => auth()->user()->id,
                    'name'          => auth()->user()->name,
                    'team_number'   => auth()->user()->team->team_number,
                    'token'         => $validated['token'],
                    'attempt_at'    => Carbon::now(),
                ]);
                Semifinal_rank::create([
                    'user_id'       => auth()->user()->id,
                    'name'          => auth()->user()->name,
                    'team_number'   => auth()->user()->team->team_number,
                ]);
                return back()->with('message', 'Semifinal Attended');
            } else {
                return back()->with('message', 'Wrong Token');
            }
        } else {
            return back()->with('message', 'Wrong Expired');
        }
    }

    public function requestQuestion(Request $request, Semifinal_tryout $semifinal_tryout)
    {
        if ($semifinal_tryout->availabled == 1) {
            return response()->json('Question not available');
        }
        $semifinal_tryout->update([
            'availabled'    => 1
        ]);
        return response()->json($semifinal_tryout);
    }

    public function questionAssign(Request $request, Semifinal_tryout $semifinal_tryout)
    {
        $semifinal_tryout->update([
            'user_id'   => $request->user
        ]);
        $user = User::firstWhere('id', $request->user);

        Semifinal_answer::create([
            'user_id'       => $user->id,
            'name'          => $user->name,
            'team_number'   => $user->team->team_number,
            'number'        => $request->number
        ]);

        return response()->json($user);
    }

    public function answerSubmit(Request $request)
    {
        $validated = $request->validate([
            'number'        => 'required|numeric',
            'answer'        => 'required|mimes:pdf,jpg,jpeg,png|max:1024'
        ]);

        if ($request->hasFile('answer')) {
            $answer = Semifinal_answer::where('number', $validated['number'])->firstWhere('user_id', auth()->user()->id);
            if ($answer->answer_file || $answer->open_submission == 0) {
                return back()->with('message', 'Already answered');
            } else {
                $fileName = auth()->user()->team->team_number . '_Answer_' . $validated['number'] . '_' . Carbon::now()->format('Y-m-d H.i.s') . '.' . $validated['answer']->extension();
                $request->answer->move(public_path('files/semifinal'), $fileName);

                $answer->update([
                    'answer_file'   => $fileName
                ]);
                return back()->with('message', 'Answer Uploaded');
            }
        }
    }

    public function questionFinished(Request $request, Semifinal_tryout $semifinal_tryout)
    {
        $answer = Semifinal_answer::where('number', $semifinal_tryout->number)->firstWhere('user_id', $request->user_id);
        $answer->update([
            'open_submission'   => 0
        ]);
        $semifinal_tryout->update([
            'availabled'    => 0,
            'user_id'       => NULL
        ]);
        return response()->json('Question finished');
    }

    public function status()
    {
        return view('admin.semifinal.status', [
            'title'         => 'Status Peserta',
            'users'         => User::where('roles', 'Semifinalist')->get(),
        ]);
    }

    public function dataPlatform()
    {
        $data = Semifinal_tryout::all();
        return json_encode($data);
    }

    public function jawaban()
    {
        return view('admin.semifinal.jawaban', [
            'title'         => 'Jawaban Peserta',
            'answers'       => Semifinal_answer::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function submitScore(Request $request, Semifinal_answer $semifinal_answer)
    {
        $semifinal_answer->update([
            'score' => $request->score
        ]);

        $scores = 0;
        $quarter_rank = Semifinal_rank::firstWhere('user_id', $semifinal_answer->user_id);
        $answers = Semifinal_answer::where('user_id', $semifinal_answer->user_id)->get();
        foreach ($answers as $answer) {
            $scores = $scores + $answer->score;
        }

        $quarter_rank->update([
            'score' => $scores
        ]);

        return response()->json(['score' => $request->score]);
    }
}
