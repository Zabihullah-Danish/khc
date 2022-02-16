<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //** this function shows home page */
    public function index()
    {
        $posts = Post::paginate(10);
        $ads = Advertisement::all();
        $sliders = Slider::all();
        return view('home.index',compact('posts','ads','sliders'));
    }

    public function viewPostDetails(Post $post)
    {
        $ads = Advertisement::all();
        $sliders = Slider::all();
        $postByCategories = Post::where('category_id',$post->category_id)->get();
        return view('home.viewPostDetails',compact('post','ads','sliders','postByCategories'));
    }
}
