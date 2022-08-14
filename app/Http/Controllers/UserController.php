<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home_page(User $user)
    {
        return view('users/home_page');
    }
}
