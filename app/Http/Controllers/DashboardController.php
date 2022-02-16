<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $users = User::all();
        $posts = Post::all();
        $trashedPosts = Post::onlyTrashed();
        $ads = Advertisement::all();
        $sliders = Slider::all();
        return view('admin.dashboard',compact('users','posts','ads','sliders','trashedPosts'));
    }
}
