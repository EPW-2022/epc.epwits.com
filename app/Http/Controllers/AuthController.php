<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Team;
use App\Models\File;
use App\Models\Leader;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->with('message', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Succesfully Logout!');
    }

    public function register()
    {
        return view('register');
    }

    public function registration(Request $request)
    {
        // Validating Data
        $validatedData = $request->validate([
            // Users
            'name'              => 'required|max:191',
            'username'          => 'required|max:191|alpha_dash|unique:users',
            'password'          => 'required|max:191|min:4|same:confirm',
            'confirm'           => 'required|max:191|min:4|same:password',
            // Teams
            'school'            => 'required|max:191',
            'city'              => 'required|max:191',
            // Leaders
            'leader_name'       => 'required|max:191',
            'leader_number'     => 'required|max:191',
            'leader_place'      => 'required|max:191',
            'leader_date'       => 'required|max:191',
            'leader_phone'      => 'required|numeric|digits_between:10,13',
            'leader_address'    => 'required',
            'email'             => 'required|max:191|email:dns|unique:users',
            // Members
            'member_name'       => 'max:191',
            'member_number'     => 'max:191',
            'member_place'      => 'max:191',
            'member_date'       => 'max:191',
            // Files
            'person_photo'      => 'required',
            'person_photo.*'    => 'mimes:jpg,png,jpeg|max:2048',
            'person_scan'       => 'required',
            'person_scan.*'     => 'mimes:jpg,png,jpeg|max:2048',
            'payment_name'      => 'required|max:191',
            'payment_slip'      => 'required|mimes:JPG,jpg,png,jpeg|max:2048'
        ]);

        // Phone Number Format
        $firstNumber = substr($validatedData['leader_phone'], 0, 1);
        if ($firstNumber === '0') {
            $validatedData['leader_phone'] = $validatedData['leader_phone'];
        } else {
            $validatedData['leader_phone'] = '0' . $validatedData['leader_phone'];
        }

        // Uploading Files
        if ($request->hasFile('person_photo') && $request->hasFile('person_scan') && $request->hasFile('payment_slip')) {
            // Uploading Photos
            $photos = $request->file('person_photo');
            $photoData = [];
            $photoIndex = 1;
            foreach ($photos as $image) {
                $newImageName = $validatedData['username'] . $photoIndex . '.' . $image->extension();
                $photoIndex++;
                $image->move(public_path('files/photos'), $newImageName);
                $photoData[] = $newImageName;
            }

            // Uploading Scan
            $scans = $request->file('person_scan');
            $scanData = [];
            $scanIndex = 1;
            foreach ($scans as $image) {
                $newImageName = $validatedData['username'] . $scanIndex . '.' . $image->extension();
                $scanIndex++;
                $image->move(public_path('files/scan'), $newImageName);
                $scanData[] = $newImageName;
            }

            // Uploading Slip
            $paymentFile = $validatedData['payment_name'] . '-payment.' . $request->payment_slip->extension();
            $request->payment_slip->move(public_path('files/payment'), $paymentFile);

            // INSERT DATA TO USERS TABLE
            $userId = User::create([
                'name'              => $validatedData['name'],
                'username'          => $validatedData['username'],
                'email'             => $validatedData['email'],
                'password'          => Hash::make($validatedData['password'])
            ])->id;

            // INSERT DATA TO TEAMS TABLE
            $teamNumber = 'EPC-' . Team::all()->count() + 1;
            Team::create([
                'user_id'           => $userId,
                'name'              => $validatedData['name'],
                'team_number'       => $teamNumber,
                'school'            => $validatedData['school'],
                'city'              => $validatedData['city']
            ]);

            // INSERT DATA TO FILES TABLE
            File::create([
                'user_id'           => $userId,
                'team_number'       => $teamNumber,
                'person_photo'      => implode(';', $photoData),
                'person_scan'       => implode(';', $scanData),
                'payment_name'      => $validatedData['payment_name'],
                'payment_slip'      => $paymentFile
            ]);

            // INSERT DATA TO LEADERS TABLE
            Leader::create([
                'user_id'           => $userId,
                'fullname'          => $validatedData['leader_name'],
                'student_number'    => $validatedData['leader_number'],
                'place_birth'       => $validatedData['leader_place'],
                'date_birth'        => $validatedData['leader_date'],
                'address'           => $validatedData['leader_address'],
                'phone'             => $validatedData['leader_phone'],
                'email'             => $validatedData['email']
            ]);

            // INSERT DATA TO MEMBERS TABLE
            Member::create([
                'user_id'           => $userId,
                'fullname'          => $validatedData['member_name'],
                'student_number'    => $validatedData['member_number'],
                'place_birth'       => $validatedData['member_place'],
                'date_birth'        => $validatedData['member_date'],
            ]);
        } else {
            return redirect('/daftar')->with('message', 'Registrasi Gagal! Silakan upload file kembali.');
        }

        return redirect('/login');
    }
}
