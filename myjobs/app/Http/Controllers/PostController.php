<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //show all the posts
    public function index() {
        $posts = Post::orderBy("created_at","desc")->get();
        return view('posts.index', ['posts'=> $posts]);
    }
    //create posts
    public function create() {
        return view('posts.create');
    }
    //edit post
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
    //update post
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg', 
    ]);

    $post = Post::find($id);

    if (!$post) {
        return redirect()->route('posts.index')
            ->with('error', 'Post not found.');
    }

    $post->title = $request->input('title');
    $post->description = $request->input('body');
    

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $imagePath = $request->file('image')->store('uploads', 'public');
        $post->image = $imagePath;
    }

    $post->save();

    return redirect()->route('posts.index')
        ->with('success', 'Post updated successfully.');
}

    // Store post
    public function store(Request $request) {
        // validations
        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $post = new Post;
    
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
    
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $file_name;
    
        $post->save();
        return redirect()->route('home')->with('success', 'Post created successfully.');
    }
    //delete post
    public function destroy($id)
{
    $post = Post::find($id);

    if (!$post) {
        return redirect()->route('home')
            ->with('error', 'Post not found');
    }

    $post->delete();

    return redirect()->route('home')
        ->with('success', 'Post deleted successfully');
}
}
