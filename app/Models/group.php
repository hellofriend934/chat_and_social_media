<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model implements CanVisit
{
    use HasVisits;
    use HasFactory;

    protected $guarded = false;

    public function messages()
    {
        return $this->hasMany(message::class,'group_id','id')->select('message','sender_id','created_at','id','files');
    }

   public function blockedUsers()
   {
       return $this->belongsToMany(User::class, 'blocked_user_chats','group_id','user_id');
   }

   public function admins()
   {
       return $this->belongsToMany(User::class,'admin_groups','group_id','user_id');
   }

   public static function is_admin( $user,  $group_id)
   {
       if (is_string($user))
       {
           $user = User::query()->find($user);
       }
       $group = group::query()->find($group_id);
       return $group->admins()->get()->contains('id', $user->id);
   }

   public function users()
   {
      return collect(json_decode($this->users));
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


}
