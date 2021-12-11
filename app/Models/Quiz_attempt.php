<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'team_number', 'token', 'attempt_at', 'session'
    ];

    public function getRouteKeyName()
    {
        return 'session';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
