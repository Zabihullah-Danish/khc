<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //** this function shows home page */
    public function index()
    {
        return view('home.index');
    }
}
