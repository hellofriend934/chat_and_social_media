<?php

namespace App\Http\Controllers\GRUD;

use App\Http\Controllers\Controller;
use App\Models\ChannelPost;
use Illuminate\Http\Request;

class EditPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $old_data = ChannelPost::query()->where('id', $request->id)->select('title','text','id')->first();
        return view('chat.edit', compact('old_data'));
    }
}
