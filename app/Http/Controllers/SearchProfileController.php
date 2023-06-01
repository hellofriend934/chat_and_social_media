<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->has('s'))
        {
           $users = User::query()->where('name', 'LIKE','%' . request()->get('s') . '%')->get();
           return view('profile_search_result',compact('users'));
        }
    }
}
