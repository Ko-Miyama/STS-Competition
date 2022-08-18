<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $input['user_id'] = $request->user()->id;
        $post->fill($input)->save();
        return redirect('/discussion');
    }
}
