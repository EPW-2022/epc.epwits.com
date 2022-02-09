<?php

namespace Database\Factories;

use App\Models\Semifinal_tryout;
use Illuminate\Database\Eloquent\Factories\Factory;

class Semifinal_tryoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Semifinal_tryout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        $category = ['Easy', 'Medium', 'Hard'];
        static $category_index = 0;
        $laboratory = ['Energi', 'Fotonika', 'Vibrastik', 'Instrumentasi', 'Bahan'];
        static $laboratory_index = 0;

        if ($number % 5 == 1 && $number > 5) {
            $category_index++;
            if ($category_index == 3) {
                $category_index = 0;
                $laboratory_index++;
                if ($laboratory_index == 5) {
                    $laboratory_index = 0;
                }
            }
        }

        return [
            'number'        => $number++,
            'category'      => $category[$category_index],
            'laboratory'    => $laboratory[$laboratory_index],
            'question'      => $this->faker->paragraph()
        ];
    }
}
