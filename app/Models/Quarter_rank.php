<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter_rank extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'team_number', 'score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
