<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotPartyGroupController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $user_id)
    {
        $try_find = group::query()->where('users','REGEXP', $user_id)->where('users','REGEXP', auth()->id())->where('is_party',0)->first();
        if ($try_find == null)
        {
            $user = User::query()->find($user_id);
            $users = collect([(integer)$user_id, auth()->id()]);
            $g =  group::query()->create(['title'=>$user->name . auth()->user()->name, 'users'=>json_encode($users),'is_party'=>0]);
            return redirect()->route('messenger',$g->id);
        }
        return redirect()->route('messenger',$try_find->id);
    }
}
