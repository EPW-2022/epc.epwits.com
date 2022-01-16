<?php

namespace Database\Factories;

use App\Models\Leader;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leader::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 4;

        return [
            'user_id'           => $id++,
            'fullname'          => $this->faker->unique()->name(),
            'student_number'    => $this->faker->unique()->randomNumber(6, true),
            'place_birth'       => $this->faker->city(),
            'date_birth'        => $this->faker->date('Y-m-d'),
            'address'           => $this->faker->unique()->streetAddress(),
            'phone'             => $this->faker->unique()->numerify('08##########'),
            'email'             => $this->faker->unique()->safeEmail()
        ];
    }
}
