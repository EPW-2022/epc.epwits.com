<?php

namespace Database\Factories;

use App\Models\Quiz_attempt;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Quiz_attemptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz_attempt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 3;

        return [
            'user_id'       => $id,
            'name'          => $this->faker->domainWord(),
            'team_number'   => 'EPC-' . $id++,
            'token'         => random_int(100000, 999999),
            'attempt_at'    => $this->faker->date('Y-m-d') . ' ' . $this->faker->time('H:i:s'),
            'session'       => Str::random(60)
        ];
    }
}
