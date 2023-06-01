<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Domain\Auth\Contracts\RegisterNewUserContract;
use Domain\Auth\DTOs\NewUserDTO;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        return view('auth.sign-up');
    }

    public function signUp(Request $request)
    {
        $user =   User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
//        event(new Registered($user));
        auth()->login($user);
        return redirect(route('home'));


    }
}
