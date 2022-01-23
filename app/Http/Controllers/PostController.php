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
        $posts = Post::where( 'user_id',$user_id)->get();
        return view('admin.posts.index',compact('posts'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        
        $tags = explode(',',$request->tags);

        if($request->has('image'))
        {
            $filename = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename,'public');

        }

        $user_id = Auth::user()->id;
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
        ]);

        foreach($tags as $tagName)
        {
            $tag = Tag::firstOrCreate(['tag' => $tagName]);
            $post->tags()->attach($tag);
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
        if(!Gate::authorize('view',$post))
        {
            abort(403);
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
        
        $tags = $post->tags->implode('tag', ',');
        return view('admin.posts.edit',compact('post','tags'));
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

        if($request->has('image'))
        {
            Storage::delete('public/uploads/' . $post->image);
            $filename = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename,'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
        ]);

        $newTags = [];

        foreach($tags as $tagName)
        {
            $tag = Tag::firstOrCreate(['tag' => $tagName]);
            array_push($newTags, $tag->id);
        }

        $post->tags()->sync($newTags);

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
        $post->delete();
        return redirect()->route('posts.index')->with('danger','Post deleted successfully');
    }
}
