<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quarter_answer;
use App\Models\Quarter_rank;
use App\Models\Quarter_tryout;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class PerempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.perempat.index', [
            'title' => 'Daftar Soal Perempat Final',
            'questions' => Quarter_tryout::orderBy('number', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.perempat.create', [
            'title' => 'Tambah Soal Perempat Final',
            'quiz'  => Quarter_tryout::latest()->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question'      => 'required',
            'number'        => 'required|numeric',
            'category'      => 'required',
        ]);

        // Question Form
        $storage = "img/perempat";
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

        Quarter_tryout::create($validated);

        return redirect('/admin/perempat')->with('message', "Question Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quarter_tryout  $quarter_tryout
     * @return \Illuminate\Http\Response
     */
    public function show(Quarter_tryout $quarter_tryout)
    {
        return view('admin.perempat.show', [
            'title' => 'Soal No ' . $quarter_tryout->number,
            'question' => $quarter_tryout
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quarter_tryout  $quarter_tryout
     * @return \Illuminate\Http\Response
     */
    public function edit(Quarter_tryout $quarter_tryout)
    {
        return view('admin.perempat.edit', [
            'title'     => 'Soal No ' . $quarter_tryout->number,
            'tryout'    => $quarter_tryout
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quarter_tryout  $quarter_tryout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quarter_tryout $quarter_tryout)
    {
        $validated = $request->validate([
            'question'      => 'required',
            'number'        => 'required|numeric',
            'category'      => 'required',
        ]);

        // Question Form
        $storage = "img/perempat";
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

        $quarter_tryout->update($validated);

        return redirect('/admin/perempat')->with('message', "Question Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quarter_tryout  $quarter_tryout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quarter_tryout $quarter_tryout)
    {
        $quarter_tryout->delete();

        return redirect('/admin/perempat')->with('message', "Question Deleted");
    }

    public function status()
    {
        return view('admin.perempat.status', [
            'title'         => 'Status Peserta',
            'users'         => User::where('roles', 'Quarter Finalist')->get()
        ]);
    }

    public function jawaban()
    {
        return view('admin.perempat.jawaban', [
            'title'         => 'Jawaban Peserta',
            'answers'       => Quarter_answer::orderBy('team_number', 'ASC')->orderBy('number', 'ASC')->get()
        ]);
    }

    public function submitScore(Request $request, Quarter_answer $quarter_answer)
    {
        $quarter_answer->update([
            'score' => $request->score
        ]);

        $scores = 0;
        $quarter_rank = Quarter_rank::firstWhere('user_id', $quarter_answer->user_id);
        $answers = Quarter_answer::where('user_id', $quarter_answer->user_id)->get();
        foreach ($answers as $answer) {
            $scores = $scores + $answer->score;
        }

        $quarter_rank->update([
            'score' => $scores
        ]);

        return response()->json(['score' => $request->score]);
    }

    public function ranking()
    {
        return view('admin.perempat.ranking', [
            'title'         => 'Ranking Peserta',
            'users'         => Quarter_rank::orderBy("score", 'DESC')->get()
        ]);
    }

    public function changerole(Team $team)
    {
        if ($team->user->roles == 'Quarter Finalist') {
            User::where('id', $team->user_id)->where('roles', $team->user->roles)->update([
                'roles' => 'Semifinalist'
            ]);
        } elseif ($team->user->roles == 'Semifinalist') {
            User::where('id', $team->user_id)->where('roles', $team->user->roles)->update([
                'roles' => 'Quarter Finalist'
            ]);
        }
        return redirect('/admin/perempat/ranking');
    }
}
