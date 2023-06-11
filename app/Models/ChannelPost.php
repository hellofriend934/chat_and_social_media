<?php

namespace App\Models;

use App\Supports\Casts\LikeCast;
use App\Supports\Casts\ViewsCast;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChannelPost extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;
    protected $casts = [
        'views'=>ViewsCast::class,
    ];
    protected $guarded = false;


    public function channel()
    {
        return $this->hasMany(Channel::class,'id','channel_id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'like_posts','channel_post_id','user_id');
    }

    public function watched()
    {
        return DB::table('laravisits')->where('visitable_type','=','App\Models\ChannelPost')->where('visitable_id','=',$this->id)->count();
    }
}
