<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\AdminGroup;
use App\Models\BlockedUserChat;
use App\Models\group;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {


        \Illuminate\Support\Facades\Gate::define('can_visit', function (User $user, $group){
            if (!BlockedUserChat::query()->where(['user_id'=>$user->id,'group_id'=>$group->id])->first()){

                   $users = collect(json_decode($group->users));
                   if ($users->contains(auth()->id())){
                       return true;
                   }else return false;
            }else{
                flash()->warning('вы заблокированы в данном чате');
                return false;
            }

        });


        Gate::define('in_group', function (User $user, $group){
            $users = collect(json_decode($group->users));
            if ($users->contains(auth()->id())){
                return true;
            }else return false;
        });

        Gate::define('admin_creater_check', function (User $user, $group_id){
          $creater_id  =  group::query()->where('id',$group_id)->value('creater_id'); // делаю так тк иногда в результате ассоц массив потому переопределяю
           if ($creater_id == $user->id or group::is_admin($user, $group_id)){
               return true;
           } else{
               flash()->warning('только администраторы и создатели могут выполнять данное действие');
               return redirect()->back();
           }
        });
    }
}
