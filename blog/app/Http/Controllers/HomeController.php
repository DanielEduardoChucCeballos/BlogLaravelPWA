<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*  public function __construct()
    {
    $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        /*   $posts = DB::table('posts')->orderBy('created_at', 'DESC')->get(); */
        $posts = \App\Models\Post::join('users', 'posts.user_id', '=', 'users.id')->join('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.created_at', 'DESC')->get();


        return view('index', compact('categories', 'posts'));

        return view('index');
    }
    public function inicio()
    {
        $categories = DB::table('categories')->get();
        /* $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->join('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.created_at', 'DESC')->get(); */
        $posts = \App\Models\Post::join('users', 'posts.user_id', '=', 'users.id')->join('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.created_at', 'DESC')->get();

        return view('index', compact('categories', 'posts'));
    }
}
