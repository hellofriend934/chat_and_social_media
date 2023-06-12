<?php

namespace App\Http\Controllers;

use App\Models\ChannelPost;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $post_id)
    {
        $post = ChannelPost::query()->find($post_id);
        if ($post!==null)
        {
           auth()->user()->likes()->toggle($post_id);
           return redirect()->back();
         }else{
            flash()->warning('произошла ошибка, пост не найден');
            return redirect()->back();
        }
    }
}
