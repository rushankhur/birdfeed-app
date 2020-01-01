<?php

namespace App\Http\Controllers;

use App\Post;
use App\Theme;
use App\User;
//use Carbon\Carbon;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostsController extends Controller
{

    public function index()
    {
        // List posts in descending order
        $posts = Post::latest('created_at')->get();
        $themes = Theme::all();

        $initial_url = Theme::where('is_default','1')->value('cdn_url');
        $initial_title = Theme::where('is_default','1')->value('name');
        //dd($initial_url);
        //$posts = Post::all();
        //$users = User::all();

        return  view('welcome', compact('posts', 'themes','initial_url', 'initial_title')); // send $posts to view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created resource in storage.
    public function store()
    {
        // back-end validation
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'image_url' => ['required', 'min:3', 'max:255', 'url'],
            'content' => ['required', 'min:3', 'max:100']
        ]);


        Post::create($attributes);

        return redirect('/feed')->with('info','Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        //return redirect('/');
        return redirect('/feed')->with('info','Post soft deleted!');
    }
}
