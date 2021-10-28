<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'team_number',
        'person_photo',
        'person_scan',
        'payment_name',
        'payment_slip',
        'deleted_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
