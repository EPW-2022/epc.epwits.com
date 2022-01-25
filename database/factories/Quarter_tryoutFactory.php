<?php

namespace Database\Factories;

use App\Models\Quarter_tryout;
use Illuminate\Database\Eloquent\Factories\Factory;

class Quarter_tryoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quarter_tryout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        $category = ['Easy', 'Medium', 'Advanced'];

        return [
            'number'        => $number++,
            'category'      => $category[mt_rand(0, 2)],
            'question'      => $this->faker->paragraph()
        ];
    }
}
