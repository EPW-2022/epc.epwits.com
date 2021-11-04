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
            'title'         => 'Dashboard Admin',
            'teams'         => Team::all()->count(),
            'unverify'      => User::where('roles', 'Participant')->where('verified_at', NULL)->count()
        ]);
    }
}
