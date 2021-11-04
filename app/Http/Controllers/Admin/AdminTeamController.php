<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeamController extends Controller
{
    public function index()
    {
        return view('admin.team.index', [
            'title'         => 'Akun Tim Peserta',
            'users'         => User::where('roles', 'Participant')->get()
        ]);
    }

    public function detail(Team $team)
    {
        return view('admin.team.detail', [
            'title'         => $team->team_number,
            'team'          => $team,
        ]);
    }

    public function verifying()
    {
        return view('admin.team.verifying', [
            'title'         => 'Perlu Verifikasi',
            'users'         => User::where('verified_at', NULL)->latest()->get()
        ]);
    }

    public function leader()
    {
        return view('admin.team.leader', [
            'title'         => 'Daftar Ketua Tim',
            'users'         => User::where('roles', 'Participant')->get()
        ]);
    }

    public function member()
    {
        return view('admin.team.member', [
            'title'         => 'Daftar Ketua Anggota',
            'users'         => User::where('roles', 'Participant')->get()
        ]);
    }

    public function verified(User $user)
    {
        $data['verified_at'] = Carbon::now();

        $user->update($data);
        return redirect('admin/tim')->with('message', 'Verified');
    }

    public function resetpass(User $user)
    {
        $data['password'] = Hash::make($user->username);

        $user->update($data);
        return redirect('admin/tim')->with('message', 'Password Reset');
    }
}
