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
        return view('posts/show')->with([
            'post' => $post,
            'messages' => $post->getMessages()
        ]);
    }

    public function edit(Post $post, Category $category)
    {
        //ログインユーザ以外からの投稿の編集を避けるための条件分岐
        if (auth()->id() === $post->user_id) {
            return view('posts/edit')->with([
                'post' => $post,
                'categories' => $category->get()
            ]);
        }
        else {
            return back();
        }
    }

    public function update(Post $post, PostRequest $request)
    {
        //ログインユーザ以外からの投稿の編集を避けるための条件
        if ($post->user_id === $request->user()->id) {
            $input = $request['post'];
            $input['user_id'] = $request->user()->id;
            $post->fill($input)->save();
        }
        return redirect('/discussion/' . $post->id);
    }

    public function delete(Post $post)
    {
        //ログインユーザ以外からの投稿の削除を避けるための条件
        if ($post->user_id === auth()->id()) {
            $post->messages()->delete();
            $post->delete();
        }
        //カテゴリ別表示画面や、ユーザ別表示画面からのdelete要求がされる場合もあるので、
        //return redirect('/discussion'); -> return back(); に変更
        return back();
    }

    public function test(Post $post)
    {
        dd($post->withCount('messages')->get());
    }
}
