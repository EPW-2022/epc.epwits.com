<?php

namespace Database\Factories;

use App\Models\Quiz_answer;
use App\Models\Quiz_tryout;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class Quiz_answerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz_answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 3;

        $answer_array = [];
        $answer_value = ['A', 'B', 'C', 'D', 'E'];
        $question = 1;
        while ($question <= 75) {
            $answer_array[] = $answer_value[mt_rand(0, 4)];
            $question++;
        }

        $score = 0;
        $true = 0;
        $false = 0;
        for ($i = 0; $i < 75; $i++) {
            $quiz = Quiz_tryout::firstWhere('number', $i + 1);
            if ($answer_array[$i] == $quiz->true_answer) {
                $score = $score + intval($quiz->score);
                $true++;
            } else {
                $false++;
            }
        }

        return [
            'user_id'       => $id,
            'name'          => $this->faker->domainWord(),
            'team_number'   => 'EPC-' . $id++,
            'answer_array'  => implode(';', $answer_array),
            'score'         => $score,
            'true'          => $true,
            'false'         => $false,
            'submitted_at'  => $this->faker->date('Y-m-d') . ' ' . $this->faker->time('H:i:s')
        ];
    }
}
