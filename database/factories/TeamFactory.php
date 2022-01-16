<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 4;
        $city = $this->faker->city();

        return [
            'user_id'       => $id,
            'name'          => $this->faker->unique()->domainWord(),
            'team_number'   => 'EPC-' . $id++,
            'school'        => 'SMA ' . $this->faker->randomDigit() . ' ' . $city,
            'city'          => $city
        ];
    }
}
