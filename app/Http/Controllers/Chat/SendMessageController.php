<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageEvent;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\group;
use App\Models\message;
use App\Models\MessagePhoto;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class SendMessageController extends Controller
{
    public function index(MessageRequest $request,  $group_id)
    {
        $group = group::query()->find($group_id);
        if (Gate::check('in_group', $group)){
            if ($request->has('message'))
            {
                $data = $request->validated();
                $message=  message::query()->create(['message'=>Crypt::encryptString($data['message']), 'sender_id'=>auth()->id(), 'group_id'=>$group_id]);
                $message =  MessageResource::make($message)->resolve();
                broadcast(new MessageEvent($message))->toOthers();
                return $message;
            }
        }else{
            $users = collect(json_decode($group->users, false));
            $new_users = $users->push(auth()->id())->toArray();
            $new_users = json_encode($users);
            group::query()->update(['users'=>$new_users]);
            if ($request->has('message'))
            {
                $data = $request->validated();
                $message=  message::query()->create(['message'=>Crypt::encryptString($data['message']), 'sender_id'=>auth()->id(), 'group_id'=>$group_id]);
                $message =  MessageResource::make($message)->resolve();
                broadcast(new MessageEvent($message))->toOthers();
                return $message;
            }
        }
        if ($request->has('message'))
        {
            $data = $request->validated();
            $message=  message::query()->create(['message'=>Crypt::encryptString($data['message']), 'sender_id'=>auth()->id(), 'group_id'=>$group_id]);
            $message =  MessageResource::make($message)->resolve();
            broadcast(new MessageEvent($message))->toOthers();
            return $message;
        }


    }
}
