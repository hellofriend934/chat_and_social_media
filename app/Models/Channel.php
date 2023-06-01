<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Illuminate\Http\Request;

class Channel extends Model
{
    use HasFactory;
    protected $guarded = false;
    public function posts()
    {
        return $this->hasMany(ChannelPost::class,'channel_id','id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class,'followers','channel_id','user_id');
    }

    public function categories()
    {
        return $this->hasMany(ChannelCategory::class,'id','category_id')->select('title','id');
    }

    public function scopeSort(\Illuminate\Database\Eloquent\Builder $builder)
    {

        if (request()->has('sort')){
            if (\request()->get('sort')!== 'title'){
                $column = explode(' ',\request()->get('sort'));
                $builder->orderBy($column[0],$column[1]);
            }else{
                $builder->orderBy(\request()->get('sort'),'asc');
            }

        }

    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Channel $ch){
            $ch->slug = $ch->slug ?? str($ch->title)->slug();
        });
    }
}
