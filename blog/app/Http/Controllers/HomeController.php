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

        return view('home');
    }
    public function inicio()
    {
        $categories = DB::table('categories')->get();
      /*   $posts = DB::table('posts')->orderBy('created_at', 'DESC')->get(); */
      $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->orderBy('posts.created_at', 'DESC')->get();


        return view('index',compact('categories','posts'));
    }
}
