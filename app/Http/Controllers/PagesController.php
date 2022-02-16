<?php

namespace App\Http\Controllers;

use App\Models\Quarter_answer;
use App\Models\Quarter_attempt;
use App\Models\Quarter_rank;
use App\Models\Quiz_answer;
use App\Models\Semifinal_answer;
use App\Models\Semifinal_attend;
use App\Models\Semifinal_rank;
use App\Models\Semifinal_tryout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index()
    {
        $semifinal_open = Carbon::create(2022, 2, 18, 18, 0, 0);
        $semifinal_closed = Carbon::create(2022, 2, 19, 13, 0, 0);
        $timenow = Carbon::now();
        $quiz_answer = Quiz_answer::firstWhere('user_id', auth()->user()->id);
        $quarter_rank = Quarter_rank::firstWhere('user_id', auth()->user()->id);

        $semifinal_attend = Semifinal_attend::firstWhere('user_id', auth()->user()->id);
        $semifinal_assign = Semifinal_answer::where('user_id', auth()->user()->id)->where('answer_file', NULL)->where('open_submission', 1)->first();

        if (auth()->user()->roles == 'Semifinalist') {
            if ($semifinal_attend && $timenow->lessThan($semifinal_closed)) {
                return view('dashboard.semifinal.submission', [
                    'score'     => Semifinal_rank::firstWhere('user_id', auth()->user()->id)->score,
                    'ranks'     => Semifinal_rank::orderBy('score', 'DESC')->get(),
                    'question'  => $semifinal_assign
                ]);
            } elseif ($timenow->greaterThan($semifinal_closed)) {
                return view('dashboard.semifinal.index', [
                    'score'     => Semifinal_rank::firstWhere('user_id', auth()->user()->id)->score,
                    'ranks'     => Semifinal_rank::orderBy('score', 'DESC')->get(),
                    'result'    => $semifinal_attend ?? NULL
                ]);
            }
            if ($timenow->greaterThan($semifinal_open)) {
                return view('dashboard.semifinal.index', [
                    'score'     => '-',
                    'ranks'     => NULL,
                    'result'    => $semifinal_attend ?? NULL
                ]);
            } else {
                return view('dashboard.congrats.perempat', [
                    'result'    => $quarter_rank
                ]);
            }
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
