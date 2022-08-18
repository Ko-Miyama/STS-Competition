<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home_page()
    {
        return view('users/home_page');
    }

    public function top()
    {
        return view('users/top');
    }

    public function rule()
    {
        return view('users/rule');
    }
}
