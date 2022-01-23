<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Leader;
use App\Models\Member;
use App\Models\Quarter_attempt;
use App\Models\Quiz_attempt;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function index()
    {
        return view('admin.superadmin.index', [
            'title'         => 'Pengaturan Superadmin',
        ]);
    }

    public function trashed()
    {
        return view('admin.superadmin.trashed', [
            'title'         => 'Data Tim Dihapus',
            'users'         => User::where('roles', 'Participant')->onlyTrashed()->get()
        ]);
    }

    public function show($team_number)
    {
        return view('admin.superadmin.show', [
            'title' => $team_number,
            'team' => Team::onlyTrashed()->firstWhere('team_number', $team_number)
        ]);
    }

    public function destroy($id)
    {
        $files = File::withTrashed()->firstWhere('user_id', $id);

        $photos = explode(';', $files->person_photo);
        foreach ($photos as $photo) {
            unlink(public_path('trash/photos/' . $photo));
        }

        $scans = explode(';', $files->person_scan);
        foreach ($scans as $scan) {
            unlink(public_path('trash/scan/' . $scan));
        }

        $payment = $files->payment_slip;
        unlink(public_path('trash/payment/' . $payment));

        File::withTrashed()->firstWhere('user_id', $id)->forceDelete();
        Team::withTrashed()->firstWhere('user_id', $id)->forceDelete();
        Leader::withTrashed()->firstWhere('user_id', $id)->forceDelete();
        Member::withTrashed()->firstWhere('user_id', $id)->forceDelete();
        User::withTrashed()->find($id)->forceDelete();

        return redirect('superadmin/trashed')->with('message', 'Delete Success');
    }

    public function restore($id)
    {
        $files = File::withTrashed()->firstWhere('user_id', $id);

        $photos = explode(';', $files->person_photo);
        $photoData = [];
        foreach ($photos as $photo) {
            $newImageName = 'Restore_' . $photo;

            rename(public_path('trash/photos/' . $photo), public_path('files/photos/' . $newImageName));
            $photoData[] = $newImageName;
        }

        $scans = explode(';', $files->person_scan);
        $scanData = [];
        foreach ($scans as $scan) {
            $newImageName = 'Restore_' . $scan;

            rename(public_path('trash/scan/' . $scan), public_path('files/scan/' . $newImageName));
            $scanData[] = $newImageName;
        }

        $payment = $files->payment_slip;
        $paymentFile = 'Restore_' . $payment;
        rename(public_path('trash/payment/' . $payment), public_path('files/payment/' . $paymentFile));

        File::where('user_id', $id)->update([
            'person_photo'      => implode(';', $photoData),
            'person_scan'       => implode(';', $scanData),
            'payment_slip'      => $paymentFile,
        ]);

        Team::withTrashed()->firstWhere('user_id', $id)->restore();
        User::withTrashed()->find($id)->restore();

        return redirect('admin/tim')->with('message', 'Restore Success');
    }

    public function penyisihan()
    {
        return view('admin.superadmin.penyisihan', [
            'title'         => 'Data Attempt Penyisihan',
            'attempts'      => Quiz_attempt::all()
        ]);
    }

    public function deleteQuiz(Request $request, Quiz_attempt $quiz_attempt)
    {
        $quiz_attempt->delete();

        return redirect('superadmin/attempt/penyisihan')->with('message', 'Delete Session');
    }

    public function perempat()
    {
        return view('admin.superadmin.perempat', [
            'title'         => 'Data Attempt Perempat Final',
            'attempts'      => Quarter_attempt::all()
        ]);
    }

    public function deleteQuarter(Request $request, Quarter_attempt $quarter_attempt)
    {
        $quarter_attempt->update([
            'session'   => NULL
        ]);

        return redirect('superadmin/attempt/perempat')->with('message', 'Delete Session');
    }
}
