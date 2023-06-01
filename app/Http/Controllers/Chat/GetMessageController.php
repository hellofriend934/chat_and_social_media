<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\group;

class GetMessageController extends Controller
{


      public function index($group_id = null)
      {

              if($group_id !== null) {
                  $res = group::query()->where('id',$group_id)->first();
                      if (\Illuminate\Support\Facades\Gate::check('can_visit',$res)){
                          return MessageResource::collection($res->messages()->with('user')->get())->resolve();

                      }else{
                          return redirect()->back();
                      }
                  }


      }

}
