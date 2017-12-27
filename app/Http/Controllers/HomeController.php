<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 3;
        $posts = Post::paginate($perPage);
        return view('landing.index', compact('posts'));
    }

    public function novosti() {
        $perPage = 6;
        $posts = Post::paginate($perPage);
        return view('landing.novosti', compact('posts'));
    }

    public function jednaNovost(Post $post) {
        return view('posts.show', compact('post'));
    }
}
