<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\AdminGroup;
use App\Models\BlockedUserChat;
use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function blockUser($user, $group_id)
    {
        if (Gate::check('admin_creater_check', $user, $group_id)){
            if (is_string($user))
            {
                $user = User::query()->find($user);
            }
            $userToBlock = $user;
            $group = group::query()->find($group_id);
            if (group::is_admin($userToBlock, $group->id) && auth()->id()!== $group->creater_id){
                flash()->warning('только создатель может отстранить админа');
                return redirect()->back();
            }
            else{
                BlockedUserChat::query()->create(['group_id'=>$group_id, 'user_id'=>$user->id]);
                if (group::is_admin($userToBlock,$group_id)){
                    AdminGroup::query()->where(['group_id'=>$group_id, 'user_id'=>$user->id])->delete();
                }
                flash()->info('пользователь заблокирован');
                return redirect()->back();
            }
        }
        else{
            flash()->warning('вы не являетесь администратором');
        }

    }

    public function unBlockUser($user, $group_id){
        if (is_string($user))
        {
            $user = User::query()->find($user);
        }
        $group = group::query()->find($group_id);
        if (group::is_admin($user,$group_id) or $group->creater_id == auth()->id()) {
           $b = BlockedUserChat::query()->where(['group_id'=>$group_id, 'user_id'=>$user->id])->first();
           $b->delete();
            flash()->info('пользователь разблокирован');
            return redirect()->back();
        }else{
            flash()->warning('разблокировать пользователя могут только администраторы');
            return redirect()->back();
        }
    }

}
