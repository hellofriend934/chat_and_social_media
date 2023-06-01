<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\group;
use Illuminate\Http\Request;

class CreatChannelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

       $data =  $request->validate(['title'=>'string|min:1|max:20|required', 'category_id'=>'int|required', 'description'=>'string']);
        Channel::query()->create(['title'=>$data['title'], 'description'=>$data['description'], 'creater_id'=>auth()->id(),'category_id'=>$data['category_id']]);
        return redirect()->back();
    }
}
