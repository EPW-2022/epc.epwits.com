<?php

namespace App\Http\Controllers;

use App\Models\Quarter_answer;
use App\Models\Quiz_answer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index()
    {
        $startPenyisihan = Carbon::create(2022, 1, 21, 0, 0, 0);
        $announcPenyisihan = Carbon::create(2022, 1, 24, 12, 0, 0);
        $startPerempat = Carbon::create(2022, 2, 4, 0, 0, 0);
        $timenow = Carbon::now();
        $quiz_answer = Quiz_answer::firstWhere('user_id', auth()->user()->id);
        $quarter_answer = Quarter_answer::firstWhere('user_id', auth()->user()->id);

        if ($timenow->greaterThan($startPenyisihan)) {
            if ($timenow->greaterThan($announcPenyisihan)) {
                if (auth()->user()->roles == 'Quarter Finalist') {
                    if ($timenow->greaterThan($startPerempat)) {
                        // announcePerempat
                        return view('dashboard.perempat', [
                            'result'    => $quarter_answer,
                        ]);
                    }
                    // return view('dashboard.welcome'); // Kalau Video Tutorial Perempat Final sudah ada
                    return view('dashboard.congrats.penyisihan', [
                        'result'    => $quiz_answer,
                    ]);
                } else {
                    return view('dashboard.failure.penyisihan', [
                        'result'    => $quiz_answer,
                    ]);
                }
            } else {
                return view('dashboard.penyisihan', [
                    'result'    => $quiz_answer
                ]);
            }
        } else {
            return view('dashboard.welcome');
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
