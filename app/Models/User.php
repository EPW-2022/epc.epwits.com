<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'roles',
        'email_verified_at',
        'verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function team()
    {
        return $this->hasOne(Team::class)->withTrashed();
    }

    public function leader()
    {
        return $this->hasOne(Leader::class);
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function file()
    {
        return $this->hasOne(File::class);
    }

    public function quiz_attempt()
    {
        return $this->hasOne(Quiz_attempt::class);
    }

    public function quiz_answer()
    {
        return $this->hasOne(Quiz_answer::class);
    }

    public function quarter_attempt()
    {
        return $this->hasOne(Quarter_attempt::class);
    }

    public function quarter_answer()
    {
        return $this->hasMany(Quarter_answer::class);
    }
}
