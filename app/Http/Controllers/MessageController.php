<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function store(Message $message, Post $post, MessageRequest $request)
    {
        $input = $request['post'];
        $input['user_id'] = $request->user()->id;
        $input['post_id'] = $post->id;
        $message->fill($input)->save();
        return redirect('/discussion/' . $post->id);
    }

    public function edit(Post $post, Message $message)
    {
        if (auth()->id() === $message->user_id && $message->post_id === $post->id) {
            return view('messages/edit')->with([
                'message' => $message,
                'post' => $post
            ]);
        }
        else {
            return back();
        }
    }

    public function update(Post $post, Message $message, MessageRequest $request)
    {
        if ($request->user()->id === $message->user_id && $message->post_id === $post->id) {
            $input = $request['post'];
            $input['user_id'] = $request->user()->id;
            $input['post_id'] = $post->id;
            $message->fill($input)->save();
        }
        return redirect('/discussion/' . $post->id);
    }

    public function delete(Post $post, Message $message)
    {
        if (auth()->id() === $message->user_id && $message->post_id === $post->id) {
            $message->delete();
        }
        return redirect('/discussion/' . $post->id);
    }
}
