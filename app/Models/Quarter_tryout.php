<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter_tryout extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'category', 'question'
    ];

    public function getRouteKeyName()
    {
        return 'number';
    }
}
