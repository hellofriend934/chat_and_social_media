<?php

namespace App\Models;

use App\Supports\Casts\ViewsCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPost extends Model
{
    use HasFactory;
    protected $casts = ['views'=>ViewsCast::class];
    protected $guarded = false;


    public function channel()
    {
        return $this->hasMany(Channel::class,'id','channel_id');
    }
}
