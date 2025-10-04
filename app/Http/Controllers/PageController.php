<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->search;

        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->with('user')
            ->latest()->paginate();

        // $posts = Post::latest()->paginate();

        return view('home', ['posts' => $posts]);
    }

    // public function blog()
    // {
        // $posts = Post::get();

        // $post=Post::first();

        // $post=Post::find(25);

        // $posts=Post::latest()->paginate();



        // dd($post);

    //     return view('blog', ['posts' => $posts]);
        
    // }

    public function post(Post $post)
    {

        return view('post', ['post' => $post]); 
        
    }
}
