<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function discussion(Post $post)
    {
        return view('posts/discussion')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $input['user_id'] = $request->user()->id;
        $post->fill($input)->save();
        return redirect('/discussion');
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function edit(Post $post, Category $category)
    {
        return view('posts/edit')->with([
            'post' => $post,
            'categories' => $category->get()
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $input['user_id'] = $request->user()->id;
        $post->fill($input)->save();
        return redirect('/discussion/' . $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/discussion');
    }
}
