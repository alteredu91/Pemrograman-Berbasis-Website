<?php

namespace App\Http\Controllers;
use Illuminate\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    } 
}