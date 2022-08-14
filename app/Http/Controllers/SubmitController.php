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

    public function overview()
    {
        return view('submits/overview');
    }

    public function leaderboard()
    {
        return view('submits/leaderboard');
    }
}
