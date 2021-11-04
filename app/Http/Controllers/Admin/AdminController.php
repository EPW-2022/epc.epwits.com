<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Team;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title'         => 'Perlu Verifikasi',
            'teams'         => Team::all()->count(),
            'verified'      => User::where('roles', 'Participant')->where('verified_at', '!=', NULL)->count()
        ]);
    }
}
