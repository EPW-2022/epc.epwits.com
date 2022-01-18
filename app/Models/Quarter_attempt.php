<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter_attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'team_number', 'token', 'attempt_at', 'session'
    ];
}
