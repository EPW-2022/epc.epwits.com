<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semifinal_attend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'team_number', 'token', 'attempt_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
