<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Leader;
use App\Models\Member;
use App\Models\Quiz_timer;
use App\Models\User;
use App\Models\Team;
use App\Models\Quiz_token;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User;
        $user->name         = 'Admin EPC';
        $user->username     = 'admin.epc';
        $user->email        = 'epc.tf2022@gmail.com';
        $user->password     = Hash::make('epcmantappol1');
        $user->roles        = 'Admin';
        $user->verified_at  = Carbon::now();
        $user->save();

        $user = new User;
        $user->name         = 'Dev EPC';
        $user->username     = 'dev.epc';
        $user->email        = 'itepw2022@gmail.com';
        $user->password     = Hash::make('DipaksaRaihanASU');
        $user->roles        = 'Superadmin';
        $user->verified_at  = Carbon::now();
        $user->save();

        $user = new User;
        $user->name         = 'Gasblarr';
        $user->username     = 'gasblarr';
        $user->email        = 'daffakurniaf11@gmail.com';
        $user->password     = Hash::make('123123123');
        $user->roles        = 'Participant';
        $user->verified_at  = Carbon::now();
        $user->save();

        $team = new Team;
        $team->user_id      = 3;
        $team->name         = 'Gasblarr';
        $team->team_number  = 'EPC-1';
        $team->school       = 'SMAN 1 Sidoarjo';
        $team->city         = 'Sidoarjo';
        $team->save();

        $leader = new Leader;
        $leader->user_id        = 3;
        $leader->fullname       = 'Daffa Kurnia Fatah';
        $leader->student_number = '02311940000068';
        $leader->place_birth    = 'Sidoarjo';
        $leader->date_birth     = '1999-10-11';
        $leader->address        = 'ASD';
        $leader->phone          = '085156317473';
        $leader->email          = 'daffakurniaf11@gmail.com';
        $leader->save();

        $member = new Member;
        $member->user_id        = 3;
        $member->fullname       = 'Daffa Kurnia Fatah';
        $member->student_number = '02311940000068';
        $member->place_birth    = 'Sidoarjo';
        $member->date_birth     = '1999-10-11';
        $member->save();

        $file = new File;
        $file->user_id          = 3;
        $file->team_number      = 'EPC-1';
        $file->person_photo     = 'EPC-1_gasblarr_Pas Foto_1.jpg';
        $file->person_scan      = 'EPC-1_gasblarr_Kartu Pelajar_1.jpg';
        $file->payment_name     = 'Daffa';
        $file->payment_slip     = 'EPC-1_gasblarr_Bukti Bayar.jpg';
        $file->member_twibbon   = NULL;
        $file->leader_twibbon   = NULL;
        $file->save();

        User::factory(50)->create();
        Team::factory(50)->create();
        Leader::factory(50)->create();
        Member::factory(50)->create();
        File::factory(50)->create();

        $token = new Quiz_token;
        $token->date    = NULL;
        $token->time    = Null;
        $token->token   = NULL;
        $token->save();

        $timer = new Quiz_timer;
        $timer->date    = NULL;
        $timer->time    = Null;
        $timer->save();
    }
}
