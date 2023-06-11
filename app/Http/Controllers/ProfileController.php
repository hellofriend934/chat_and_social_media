<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request, $user_id = null)
    {

        if ($user_id!==null)
        {
            $user = User::query()->find($user_id);
            if ($user !== null){
                return view('auth.profile',compact('user'));
            }else flash()->info('пользователя не существует'); return redirect()->back();

        }else{
            return view('auth.profile',['user'=>auth()->user()]);

        }
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:10','bio'=>'string|max:255']);

        auth()->user()->update(['name'=>$data['name'],'bio'=>$data['bio'],'TwoFa'=>$request->input('TwoFa')]);
        return redirect()->back();
    }
}
