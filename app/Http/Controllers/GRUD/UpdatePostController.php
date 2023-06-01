<?php

namespace App\Http\Controllers\GRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\ChannelPost;
use Illuminate\Http\Request;

class UpdatePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate(['title'=>'required|string','text'=>'required|string|min:5','image'=>'image']);

        $post = ChannelPost::query()->find(request()->id);
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->save();
        return redirect()->route('channel', request()->channel);
    }
}
