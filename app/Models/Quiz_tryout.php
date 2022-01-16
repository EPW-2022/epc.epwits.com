<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_tryout extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'category', 'score', 'question', 'true_answer', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e'
    ];

    public function getRouteKeyName()
    {
        return 'number';
    }
}
