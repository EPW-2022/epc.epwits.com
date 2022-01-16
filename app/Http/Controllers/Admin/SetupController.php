<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz_attempt;
use App\Models\Quiz_timer;
use Illuminate\Http\Request;
use App\Models\Quiz_token;

class SetupController extends Controller
{
    public function setup()
    {
        return view('admin.penyisihan.setup', [
            'title' => 'Pengaturan Quiz',
            'token' => Quiz_token::latest('id')->first(),
            'timer' => Quiz_timer::latest('id')->first()
        ]);
    }

    public function generate_token(Request $request, Quiz_token $quiz_token)
    {
        $validated = $request->validate([
            'date'  => 'required',
            'time'  => 'required',
        ]);
        $validated['token'] = random_int(100000, 999999);

        $quiz_token->update([
            'date'  => $validated['date'],
            'time'  => $validated['time'],
            'token' => $validated['token']
        ]);

        return redirect('/admin/penyisihan/setup')->with('message', 'Token Generated');
    }

    public function delete_token(Quiz_token $quiz_token)
    {
        $quiz_token->delete();

        return redirect('/admin/penyisihan/setup')->with('message', 'Token Deleted');
    }

    public function set_timer(Request $request, Quiz_timer $quiz_timer)
    {
        $validated = $request->validate([
            'date'  => 'required',
            'time'  => 'required',
        ]);

        $quiz_timer->update($validated);

        return redirect('/admin/penyisihan/setup')->with('message', 'Timer Set');
    }
}
