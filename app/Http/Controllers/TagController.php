<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        //
        $tags = Tag::all();
        
        return view('tag.index', ['tags' => $tags]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create () {
        //
        return view('tag.create');
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
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $tag       = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        
        $tag->save();
        
        return redirect()->route('tags.index');
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
        $tag = Tag::findOrFail($id);
        
        return view('tag.show', ['tag' => $tag]);
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
        $tag = Tag::findOrFail($id);
        
        return view('tag.edit', ['tag' => $tag]);
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
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        
        $tag->save();
        
        return redirect()->route('tags.show', ['tag' => $tag->id]);
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
        $tag = Tag::findOrFail($id);
        $tag->delete();
        
        return redirect()->route('tags.index');
    }}
