<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelCategory;
use App\Models\follower;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index($slug = null)
    {
        $data = null;
        $categories = ChannelCategory::query()->select('title','id')->get();
        if ($slug!== null)
        {

          $data = Channel::query()->where('slug',$slug)->first();
          if ( $data !== null){
              $posts = $data->posts()->paginate(3);
              return view('chat.channel', compact('data','categories', 'posts'));
          }
            return view('chat.channel', compact('categories','data'));

        }
        $channels = Channel::query()->where('creater_id',auth()->id())->get();
        if (isset($channels)){
            return view('chat.channel', compact('data','categories','channels'));
        }
        return view('chat.channel', compact('data','categories'));

    }

    public function category()
    {
        //
    }

    public function follow(Request $request, $channel_id)
    {
        auth()->loginUsingId(1);
        if (follower::query()->where(['user_id'=>auth()->id(), 'channel_id'=>$channel_id])->first()){
            auth()->user()->likedPosts()->detach($channel_id);
            flash()->warning('вы описались от этого канал');
            return redirect()->back();

        }
           auth()->user()->likedPosts()->attach($channel_id);
           flash()->info('вы отслеживаете этот канал');
           return redirect()->back();

    }
}
