<?php

namespace App\Http\Controllers;
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('home');
    }
}
