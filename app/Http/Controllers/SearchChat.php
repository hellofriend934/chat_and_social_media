<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;

class SearchChat extends Controller
{
    public function __invoke(Request $request)
    {
        if (request()->has('s')){
            {
                    $result = group::query()->where('title', 'like', '%' . request()->get('s') . '%')->where('is_party',1)->select('title','id','description','creater_id')->sort()->get();
            }
         return back()->with(['result'=>$result]);
        }
    }

}
