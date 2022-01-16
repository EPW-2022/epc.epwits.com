<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 4;

        return [
            'user_id'           => $id,
            'team_number'       => 'EPC-' . $id++,
            'person_photo'      => 'EPC-1_gasblarr_Pas Foto_1.jpg',
            'person_scan'       => 'EPC-1_gasblarr_Kartu Pelajar_1.jpg',
            'payment_name'      => 'Daffa',
            'payment_slip'      => 'EPC-1_gasblarr_Bukti Bayar.jpg',
            'member_twibbon'    => NULL,
            'leader_twibbon'    => NULL
        ];
    }
}
