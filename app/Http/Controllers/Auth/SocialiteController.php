<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function index()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $githubUser->id)->first();

        //todo 3rd lesson move to custom table
        if ($user!== null) {
            $user->update([
                'github_id' => $githubUser->id,
            ]);
        } else {
            $user = User::create([
                'name' => $githubUser->name ?? 'user',
                'email' => $githubUser->email,
                'github_id' => $githubUser->id ?? 23,
            ]);
        }
        session()->invalidate();
        session()->regenerate();
        Auth::login($user);

        return redirect('/');
    }
}
