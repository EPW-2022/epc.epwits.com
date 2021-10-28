<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'team_number',
        'school',
        'city'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
