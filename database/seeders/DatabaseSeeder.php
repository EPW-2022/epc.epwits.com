<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
    }
}
