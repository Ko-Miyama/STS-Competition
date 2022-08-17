<?php

namespace App\Http\Controllers;

use App\Models\Submit;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function submit()
    {
        return view('submits/submit');
    }

    public function store(Submit $submit, Request $request)
    {
        //↓後でこのコードにする為に、sqlのfile_pathの文字数制限を長くする
        //$file_path = $request->file('file')->store('');
        $file_name = $request->file('file')->getClientOriginalName();
        $file_path = $request->file('file')->storeAs('', 'a.txt');
        $score = rand(0, 100) / 100;
        //**↑randじゃなくちゃんとしたスコアにする**

        $input = $request['post'];
        $input['file_path'] = $file_path;
        $input['score'] = $score;
        $input['user_id'] = $request->user()->id;

        $submit->fill($input)->save();
        return view('submits/result')->with(['score' => $score]);
    }

    public function overview(Request $request)
    {
        dd($request->user()->id);
        //return view('submits/overview');
    }

    public function leaderboard()
    {
        return view('submits/leaderboard');
    }
}
