<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //** this function shows home page */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('home.index',compact('posts'));
    }
}
