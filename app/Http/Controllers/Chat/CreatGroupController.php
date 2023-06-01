<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\group;
use Illuminate\Http\Request;

class CreatGroupController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       $data =  $request->validate(['title'=>'string|min:1|max:20|required', 'is_public'=>'boolean|required', 'description'=>'string']);
       $users = json_encode([auth()->id()]);
        group::query()->create(['title'=>$data['title'], 'is_public'=>$data['is_public'], 'description'=>$data['description'], 'users'=>$users, 'is_party'=>1,'creater_id'=>auth()->id()]);
        return redirect()->back();
    }
}
