<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->with(['tags', 'author'])
            ->get();

        return view('admin.post.list', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.post.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $temp = 1500;
        $wordsLength = mb_strlen(strip_tags($request->description));
        $minutes = ceil($wordsLength / $temp);

        $model = Post::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $minutes,
            'author_id' => Auth::id()
        ]);

        $model->tags()->attach([$request->tags]);

        return to_route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {   
        return view('admin.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('admin.post.index');
    }
}
