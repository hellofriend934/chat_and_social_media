<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SendImageController extends Controller
{
    public function __invoke(Request $request, $group_id)
    {
        if ($request->has('image') && $request->file('image')!== null){
            $data = $request->validate(['image'=>'image']);
            $path =  Storage::disk('public')->put("chat" .$group_id, $data['image']);

            $message = message::query()->create(['files'=>$path,'group_id'=>$group_id,'sender_id'=>auth()->id()]);
            $message =  MessageResource::make($message)->resolve();
            broadcast(new MessageEvent($message));
            return redirect()->back();
        }
    }


}
