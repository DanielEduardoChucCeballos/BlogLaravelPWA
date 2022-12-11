<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        /* $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->join('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.created_at', 'DESC')->get(); */
        $posts = \App\Models\Post::join('users', 'posts.user_id', '=', 'users.id')->join('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.created_at', 'DESC')->select('posts.id','posts.title','posts.perex','posts.slug','users.name','categories.namecategory','posts.updated_at')->get();

        return view('posts.index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'perex' => 'required',

            'enabled' => 'required',

            'category_id' => 'required',
        ]);

        $post = new \App\Models\Post();

        $post->title = $request->input('title');
        $post->slug = \Str::slug($request->input('title'));
        $post->perex = $request->input('perex');
        $post->published_at = date('Y-m-d H:i:s');
        $post->enabled = $request->input('enabled');
        $post->user_id = $request->input('user_id');
        $post->category_id = $request->input('category_id');

        $post->save();
        /* dd($post); */
        return redirect()->route('posts.index')->with('Post Publicado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $posts)
    {

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->get();

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required',
            'slug' => 'required',
            'perex' => 'required',
            'published_at' => 'required',
            'enabled' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        $post = \App\Models\Post::find($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('Éxito', 'Post actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =  $id;
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('posts.index')->with('success', 'Company has been deleted successfully');
    }
}
