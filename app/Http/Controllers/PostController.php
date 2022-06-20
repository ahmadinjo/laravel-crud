<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        //
        $posts = Post::with(['tags', 'category', 'author'])->get();
        
        return view('post.index', ['posts' => $posts]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create () {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request) {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
        ]);
        
        $category = Category::where('slug', $request->category_slug)->firstOrFail();
        $tags = Tag::whereIn('id', $request->tags)->get();
        $user = User::find(1);
        $auth_user = auth()->user();
        
        $post       = new Post();
        $post->title = Str::title($request->title);
        $post->slug = Str::slug($request->title . ' ' . Str::random(4));
        $post->content = $request->body;
        $post->category()->associate($category);
        $post->author()->associate($auth_user);
    
        $post->save();
        $post->tags()->sync($tags);
    
        return redirect()->route('posts.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show ($id) {
        //
        $post = Post::with('author', 'category', 'tags')->findOrFail($id);
        
        return view('post.show', ['post' => $post]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ($id) {
        //
        $post = Post::with('author', 'category', 'tags')->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id) {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'text', 'max:255'],
        ]);
    
        $category = Category::where('slug', $request->category_slug)->firstOrFail();
        $tags = Tag::whereIn('id', $request->tags)->get();
        
        $post = Post::findOrFail($id);
        $post->title = Str::title($request->title);
        $post->slug = Str::slug($request->title . ' ' . Str::random(4));
        $post->content = $request->body;
        $post->category()->associate($category);
        $post->tags()->sync($tags);
        
        $post->save();
        
        return redirect()->route('posts.show', ['post' => $post->id]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id) {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        
        return redirect()->route('posts.index');
    }
}
