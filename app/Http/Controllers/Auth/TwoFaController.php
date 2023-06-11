<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class TwoFaController extends Controller
{

    public function TwoFa()
    {

        $google2fa = new Google2FA();
        $secretKey = $google2fa->generateSecretKey();

        if (auth()->user()->google2fa_secret === null){
            User::where('id',auth()->user()->id)->update(['google2fa_secret'=>$secretKey]);
        }
        return view('auth2fa.login2fa',compact('secretKey'));


    }

    public function OtpCheck(User $user,Request $request)
    {

        $google2fa = new Google2FA();
        $secret = $request->input('secret');
        $user = auth()->user();
        if($google2fa->verifyKey($user->google2fa_secret, $secret)){
            \auth()->user()->TwoFa == 1;
            return redirect('/');
        }
        else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect('/');
    }

    public function index()
    {
        return view('auth2Fa.login');
    }
}
