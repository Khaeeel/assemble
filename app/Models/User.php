<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Table name (optional, 'users' is default)
    protected $table = 'users';
    

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    // Hidden attributes when serialized
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Attribute casting
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}


