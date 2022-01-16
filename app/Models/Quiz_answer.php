<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'team_number', 'answer_array', 'score', 'true', 'false', 'submitted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
