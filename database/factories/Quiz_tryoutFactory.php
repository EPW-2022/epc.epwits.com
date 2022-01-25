<?php

namespace Database\Factories;

use App\Models\Quiz_tryout;
use Illuminate\Database\Eloquent\Factories\Factory;

class Quiz_tryoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz_tryout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        $category = ['Easy', 'Medium', 'Advanced'];
        $answer = ['A', 'B', 'C', 'D', 'E'];

        return [
            'number'        => $number++,
            'category'      => $category[mt_rand(0, 2)],
            'score'         => 100,
            'question'      => $this->faker->paragraph(5),
            'true_answer'   => $answer[mt_rand(0, 4)],
            'answer_a'      => $this->faker->sentence(),
            'answer_b'      => $this->faker->sentence(),
            'answer_c'      => $this->faker->sentence(),
            'answer_d'      => $this->faker->sentence(),
            'answer_e'      => $this->faker->sentence(),
        ];
    }
}
