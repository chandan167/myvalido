<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;


    protected $attributes =[
        "name" => "",
        "email" => "",
        "email_verified_at" => null,
        "phone" => null,
        "phone_verified_at" => null,
        "is_super_admin" => "0",
        "profile_image" => null,
        "status" => "1",
        "password" => "",
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_super_admin'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
