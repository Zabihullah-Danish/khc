<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //** this function shows home page */
    public function index()
    {
        
        $posts = Post::with(['views','category'])->latest();
        if(request('search'))
        {
            $posts
                ->where('title','like', '%' . request('search') . '%')
                ->orWhere('content','like', '%' . request('search') . '%');
        }
        $ads = Advertisement::all();
        $sliders = Slider::all();
        $categories = Category::all();
        return view('home.index',[
            'posts' => $posts->get(),
            'ads' => $ads,
            'categories' => $categories,
            'sliders' => $sliders,
        ]);
    }

    public function viewPostDetails(Post $post)
    {
        $ads = Advertisement::all();
        $sliders = Slider::all();
        $categories = Category::all();
        $postByCategories = Post::where('category_id',$post->category_id)->get();
        View::create([
            'post_id' => $post->id,
            'view' => 1,
        ]);
        return view('home.viewPostDetails',compact('post','ads','sliders','categories','postByCategories'));
    }

    public function viewPostsByCategory(Category $category)
    {
        if($category->category == "about")
        {
            abort(404);
        }
        $posts = Post::where('category_id', $category->id)->get();
        $categories = Category::all();
        $ads = Advertisement::all();
        $sliders = Slider::all();
        return view('home.viewPostsByCategory',compact('ads','sliders','posts','categories','category'));
    }

    public function about()
    {
        $ads = Advertisement::all();
        $sliders = Slider::all();
        $categories = Category::all();
        // $about = Post::where('')
        // dd('about page');
        return view('home.about', compact('ads','sliders','categories'));
    }

   
}
