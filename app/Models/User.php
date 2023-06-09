<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'TwoFa',
        'github_id'
    ];




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
//    protected $hidden = [
//        'password',
//        'remember_token',
//        'two_factor_recovery_codes',
//        'two_factor_secret',
//    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
//     */



    public function likedPosts()
    {
        return $this->belongsToMany(Channel::class,'followers','user_id','channel_id');
    }


    public function likes()
    {
        return $this->belongsToMany(ChannelPost::class,'like_posts','user_id','channel_post_id');
    }


    public function status()
    {
        return $this->belongsTo(Order::class,'user_id','id');
    }
}
