<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'address',
        'profile_image'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* ================= RELATIONS ================= */

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
