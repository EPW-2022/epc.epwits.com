<?php

namespace App\Http\Controllers;

use App\Models\Quiz_answer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index()
    {
        $open = Carbon::create(2022, 1, 21, 0, 0, 0);
        $timenow = Carbon::now();
        $quiz_answer = Quiz_answer::firstWhere('user_id', auth()->user()->id);

        if ($timenow->greaterThan($open)) {
            return view('dashboard.penyisihan', [
                'score' => empty($quiz_answer) ? '-' : $quiz_answer->score
            ]);
        } else {
            return view('dashboard.welcome', [
                'score' => empty($quiz_answer) ? '-' : $quiz_answer->score
            ]);
        }
    }

    public function verifying()
    {
        return view('verifying');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username'  => 'required|max:191|alpha_dash',
            'oldpass'   => 'required|password',
            'password'  => 'required|max:191|min:4|same:confirm',
            'confirm'   => 'required|max:191|min:4|same:password',
        ]);
        User::where('username', auth()->user()->username)->update([
            'password'  => Hash::make($request['password'])
        ]);

        return redirect('/')->with('message', "Profile Updated");
    }
}
