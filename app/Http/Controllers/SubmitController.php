<?php

namespace App\Http\Controllers;

use App\Models\Submit;
use Illuminate\Http\Request;
use App\Http\Requests\SubmitRequest;

class SubmitController extends Controller
{
    public function submit()
    {
        return view('submits/submit');
        /*$command = 'python3 ../app/Python/correlation.py ../storage/app/a.txt';
        exec($command, $output);
        dd($output);*/
    }

    public function store(Submit $submit, SubmitRequest $request)
    {
        $file_name = $request->file('file')->store('');
        $file_path = '../storage/app/' . $file_name;
        $command = 'python3 ../app/Python/correlation.py ' . $file_path;
        exec($command, $score);
        $score = $score[0];

        $input = $request['post'];
        $input['file_path'] = $file_path;
        $input['score'] = $score;
        $input['user_id'] = $request->user()->id;

        $submit->fill($input)->save();
        return view('submits/result')->with(['score' => $score]);
    }

    public function overview(Submit $submit, Request $request)
    {
        //$submits = $submit->getSelectedPaginateByLimit($request->user()->id);
        //return view('submits/overview')->with(['submits' => $submits]);
        return view('submits/overview')->with(['submits' => $request->user()->getSubmitsPaginateByLimit()]);
    }

    public function leaderboard(Submit $submit)
    {
        return view('submits/leaderboard')->with(['submits' => $submit->getOrderedByScore()]);
    }
}
