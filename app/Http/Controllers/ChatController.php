<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\BlockedUserChat;
use App\Models\Channel;
use App\Models\group;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

class ChatController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request)
    {
        $users = collect();
        $my_id = auth()->id();
        if ( $group_id = request('group_id')){
            $group = group::query()->find($group_id);
            if (isset($group->users))
            {
                $users_id =  $group->users();
                if (!$users_id->contains(auth()->id()))
                {
                   $users_id->push(auth()->id());
                   $group->update(['users'=>json_encode($users_id)]);
                }
                foreach ($users_id as $user_id){
                    $users->push(User::query()->find($user_id));
                }

                $users->transform(function ($user) use($group){
                    if ($user!==null){
                        if ($user->id == $group->creater_id){
                            $user->status = 'creater';
                        }elseif (group::is_admin($user, $group->id)){
                            $user->status = 'admin';
                        }elseif(BlockedUserChat::query()->where(['group_id'=>$group->id, 'user_id'=>$user->id])->first()){
                            $user->status = 'blocked_user';
                        }else {
                            $user->status = 'user';
                        }
                    }
                    return $user;
                });
            }


            if ($group !== null){
                $group->visit();
                if (\Illuminate\Support\Facades\Gate::check('can_visit',$group)){
                    return view('chat.chat', compact('group_id','my_id','users','group'));
                }else{
                    session()->has('shop_flash_message') ? flash()->warning(session()->get('shop_flash_message')) :  flash()->warning('вы не имеете доступа к этой группе');

                    return redirect()->back();
                }
            }else {
                return redirect()->back();
            }


        }
        else{
            if ($request->get('sort_my_chats')=='not party')
            {
                $result = group::query()->where('users','REGEXP', auth()->id())->where('is_party', 0)->get();
            }else{
                $result = group::query()->where('users','REGEXP', auth()->id())->get();

            }
                if (!empty($result))
                {
                    return view('chat.chat',compact('result'));
                }
                return view('chat.chat');


        }


    }

}
