<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!auth()->user()->khc_model->posts)
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        $user_id = Auth::user()->id;
        $posts = Post::latest()->where('user_id',$user_id)->get();
        $categories = Category::all();
        // dd($posts);
        return view('admin.posts.index',compact('posts','categories'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!auth()->user()->permission->create_post)
        {
            abort(403);
        }

        $categories = Category::all();
       
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $tags = explode(',',$request->tags);
        // dd($tags);
        if($request->has('image'))
        {
            $filename = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename,'public');

        }

        // dd($request->content);

        $user_id = Auth::user()->id;
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
        ]);

        foreach($tags as $tagName)
        {
            $post->tags()->create([
                'tag' => $tagName,
            ]);
        }


        return redirect()->route('posts.index')->with('success','Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if(!auth()->user()->permission->view_post)
        {
            abort(403);
        }

        if(!Gate::allows('view',$post))
        {
            abort(404);
        }
        return view('admin.posts.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!auth()->user()->permission->edit_post)
        {
            abort(403);
        }
        
        // dd(Gate::allows('edit',$post));
        if(!Gate::allows('view',$post))
        {
          abort(404);  
        }
        $categories = Category::all();
        $tags = $post->tags->implode('tag', ',');
        // dd($tags);
        return view('admin.posts.edit',compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        
        $tags = explode(",", $request->tags);
        // dd($tags);
        if($request->has('image'))
        {
            Storage::delete('public/uploads/' . $post->image);
            $filename = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename,'public');
        }
        $post->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename ?? $post->image,
        ]);

        if($post->tags())
            {
                $post->tags()->delete();
            }

        foreach($tags as $tagName)
        {
            
            $post->tags()->updateOrCreate([
                'tag' => $tagName,
            ]);
        }

        // $post->tags()->sync($newTags);

        return redirect()->back()->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(!auth()->user()->permission->delete_post)
        {
            abort(403);
        }

        $post->delete();
        Storage::delete('public/uploads/' . $post->image);
        return redirect()->route('posts.index')->with('danger','Post deleted successfully');
    }

    public function trashedPosts()
    {
        if(!auth()->user()->is_admin)
        {
            abort(403);
        }
        $trashedPosts = Post::onlyTrashed()->get();
        // dd($trashedPosts);
        return view('admin.posts.trashedPosts',compact('trashedPosts'));
    }

    public function restorePost($post)
    {
        // dd($post);
        $findPost = Post::onlyTrashed()->find($post);
        $findPost->restore();
        return redirect()->back()->with('success','Post restored successfully');

    }

    public function deletePost($post)
    {
        $findPost = Post::onlyTrashed()->find($post);
        $findPost->forceDelete();
        return redirect()->back()->with('danger','Post deleted successfully');
    }
}
