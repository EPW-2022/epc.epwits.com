<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semifinal_tryout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'number', 'category', 'laboratory', 'availabled', 'question'
    ];

    public function getRouteKeyName()
    {
        return 'number';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
