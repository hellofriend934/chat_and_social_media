<?php

namespace App\Http\Controllers\Auth;

use App\Events\AfterSessionRegenerated;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormRequest;
use Domain\Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Supports\SessionRegenerator;


class SignInController extends Controller
{

    public function index()
    {

        return view('auth.sign-in');
    }

    public function signIn(SignInFormRequest $request)
    {
        $data =  $request->validated();
         if (auth()->attempt($data,$request->post('remember'))){
             request()->session()->regenerate(); //делаем его невалидным
              if (\auth()->user()->TwoFa == 1){
                return redirect('/2fa');
              }
             return redirect()->intended(route('home'));
         }
        return back()->withErrors(['email'=>'данного пользователя не существует']);
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

}
