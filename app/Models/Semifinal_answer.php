<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semifinal_answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'team_number', 'number', 'answer_file', 'score', 'open_submission'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
