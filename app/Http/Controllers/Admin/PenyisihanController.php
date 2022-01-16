<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz_answer;
use App\Models\Quiz_attempt;
use App\Models\User;
use App\Models\Quiz_token;
use App\Models\Quiz_tryout;
use App\Models\Team;
use Illuminate\Http\Request;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class PenyisihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penyisihan.index', [
            'title' => 'Daftar Soal Penyisihan',
            'questions' => Quiz_tryout::orderBy('number', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penyisihan.create', [
            'title' => 'Tambah Soal Penyisihan',
            'quiz'  => Quiz_tryout::latest()->first()
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
            'answer_a'      => 'required',
            'answer_b'      => 'required',
            'answer_c'      => 'required',
            'answer_d'      => 'required',
            'answer_e'      => 'required',
            'number'        => 'required|numeric',
            'score'         => 'required|numeric',
            'category'      => 'required',
            'true_answer'   => 'required'
        ]);

        // Question Form
        $storage = "img/penyisihan";
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

        // Answer A Form
        $answer_a = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_a->loadHTML($request->answer_a, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_a->getElementsByTagName('img');
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
        $validated['answer_a'] = $answer_a->saveHTML();

        // Answer B Form
        $answer_b = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_b->loadHTML($request->answer_b, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_b->getElementsByTagName('img');
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
        $validated['answer_b'] = $answer_b->saveHTML();

        // Answer C Form
        $answer_c = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_c->loadHTML($request->answer_c, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_c->getElementsByTagName('img');
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
        $validated['answer_c'] = $answer_c->saveHTML();

        // Answer D Form
        $answer_d = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_d->loadHTML($request->answer_d, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_d->getElementsByTagName('img');
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
        $validated['answer_d'] = $answer_d->saveHTML();

        // Answer E Form
        $answer_e = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_e->loadHTML($request->answer_e, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_e->getElementsByTagName('img');
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
        $validated['answer_e'] = $answer_e->saveHTML();

        Quiz_tryout::create($validated);

        return redirect('/admin/penyisihan')->with('message', "Question Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz_tryout  $quiz_tryout
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz_tryout $quiz_tryout)
    {
        return view('admin.penyisihan.show', [
            'title' => 'Soal No ' . $quiz_tryout->number,
            'question' => $quiz_tryout
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz_tryout  $quiz_tryout
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz_tryout $quiz_tryout)
    {
        return view('admin.penyisihan.edit', [
            'title'     => 'Soal No ' . $quiz_tryout->number,
            'tryout'    => $quiz_tryout
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz_tryout  $quiz_tryout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz_tryout $quiz_tryout)
    {
        $validated = $request->validate([
            'question'      => 'required',
            'answer_a'      => 'required',
            'answer_b'      => 'required',
            'answer_c'      => 'required',
            'answer_d'      => 'required',
            'answer_e'      => 'required',
            'number'        => 'required|numeric',
            'score'         => 'required|numeric',
            'category'      => 'required',
            'true_answer'   => 'required'
        ]);

        // Question Form
        $storage = "img/penyisihan";
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

        // Answer A Form
        $answer_a = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_a->loadHTML($request->answer_a, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_a->getElementsByTagName('img');
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
        $validated['answer_a'] = $answer_a->saveHTML();

        // Answer B Form
        $answer_b = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_b->loadHTML($request->answer_b, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_b->getElementsByTagName('img');
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
        $validated['answer_b'] = $answer_b->saveHTML();

        // Answer C Form
        $answer_c = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_c->loadHTML($request->answer_c, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_c->getElementsByTagName('img');
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
        $validated['answer_c'] = $answer_c->saveHTML();

        // Answer D Form
        $answer_d = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_d->loadHTML($request->answer_d, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_d->getElementsByTagName('img');
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
        $validated['answer_d'] = $answer_d->saveHTML();

        // Answer E Form
        $answer_e = new \DOMDocument();
        libxml_use_internal_errors(true);
        $answer_e->loadHTML($request->answer_e, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $answer_e->getElementsByTagName('img');
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
        $validated['answer_e'] = $answer_e->saveHTML();

        $quiz_tryout->update($validated);

        return redirect('/admin/penyisihan')->with('message', "Question Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz_tryout  $quiz_tryout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz_tryout $quiz_tryout)
    {
        $quiz_tryout->delete();

        return redirect('/admin/penyisihan')->with('message', "Question Deleted");
    }

    public function status()
    {
        return view('admin.penyisihan.status', [
            'title'         => 'Status Peserta',
            'users'         => User::where('roles', 'Participant')->get()
        ]);
    }

    public function ranking()
    {
        return view('admin.penyisihan.ranking', [
            'title'         => 'Ranking Peserta',
            'users'         => Quiz_answer::all()->sortBy("score")
        ]);
    }

    public function answer(Team $team)
    {
        return view('admin.penyisihan.answer', [
            'title'         => 'Jawaban Peserta ' . $team->team_number,
            'team'          => $team,
            'tryouts'       => Quiz_tryout::all(),
            'answers'       => $team->user->quiz_answer
        ]);
    }
}
