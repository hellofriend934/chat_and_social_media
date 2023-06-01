<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

class HomeController extends Controller
{

    public function __invoke():View
    {
        return view('index');
    }
}
