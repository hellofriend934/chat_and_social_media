<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\group;
use Illuminate\Http\Request;

class LeaveGroup extends Controller
{
    public function __invoke($group_id)
    {
         $group = group::query()->find($group_id);
         if ($group !== null)
         {
           $users =   collect(json_decode($group->users));
           dd($users);
           if ($users->contains(auth()->id())){
                 foreach ($users as $key => $item)
                 {
                    if ($item == auth()->id())
                    {
                        $users->forget($key);
                    }
                 }
             $group->update(['users'=>json_encode($users)]);
                 flash()->info('вы вышли из группы');
                 return redirect()->back();
           }else{
               flash()->info('вы не в группе');
               return redirect()->back();
           }
         }
    }
}
