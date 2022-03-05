<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class VeiwPostCountController extends Controller
{
    public function viewPost(Post $post)
    {
        dd($post->id);
    }
}
