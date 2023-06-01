<?php

namespace App\Http\Controllers\GRUD;

use App\Actions\GRUD\CreatePostAction;
use App\DTOs\NewPostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Channel;
use App\Models\ChannelPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreatePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $channel_id = Channel::query()->where('slug',request()->slug)->select('id')->value('id');
        $data = $request->validate(['title'=>'required|string','text'=>'required|string|min:5','image'=>'image']);
        if ($request->file('image')){
          $path =  Storage::disk('public')->put('post',$request->file('image'));
            ChannelPost::query()->create(['title'=>$data['title'], 'text'=>$data['text'], 'channel_id'=>$channel_id, 'image'=>$path]);
            return redirect()->back();
        }else{
            ChannelPost::query()->create(['title'=>$data['title'], 'text'=>$data['text'], 'channel_id'=>$channel_id]);
            return redirect()->back();
        }
    }
}
