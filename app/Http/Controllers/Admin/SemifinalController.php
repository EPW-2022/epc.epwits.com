<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semifinal_tryout;
use App\Models\User;
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
            'users'         => User::where('roles', 'Semifinalist')->get()
        ]);
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
        return response()->json($user->name);
    }

    public function questionFinished(Request $request, Semifinal_tryout $semifinal_tryout)
    {
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
}
