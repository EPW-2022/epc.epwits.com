<?php

namespace App\Http\Controllers;

use App\Models\Quarter_answer;
use App\Models\Quarter_attempt;
use App\Models\Quarter_rank;
use App\Models\Quiz_answer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index()
    {
        $timenow = Carbon::now();
        $quiz_answer = Quiz_answer::firstWhere('user_id', auth()->user()->id);
        $quarter_attempt = Quarter_attempt::firstWhere('user_id', auth()->user()->id);
        $quarter_rank = Quarter_rank::firstWhere('user_id', auth()->user()->id);

        if (auth()->user()->roles == 'Semifinalist') {
            return view('dashboard.congrats.perempat', [
                'result'    => $quarter_rank
            ]);
        } elseif (auth()->user()->roles == 'Quarter Finalist') {
            return view('dashboard.failure.perempat', [
                'result'    => $quarter_rank
            ]);
        } elseif (auth()->user()->roles == 'Participant') {
            return view('dashboard.failure.penyisihan', [
                'result'    => $quiz_answer
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
