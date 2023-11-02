<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         * @var array<int, string>
         */
    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'address',
        'phoneNumber',
        'birthdate',
        'religion',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     if ($password) {
    //         $this->attributes['password'] = bcrypt($password);
    //     }
    // }
}