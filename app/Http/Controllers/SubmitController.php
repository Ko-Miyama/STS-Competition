<?php

namespace App\Http\Controllers;

use App\Models\Submit;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function index(Submit $submit)
    {
        return $submit->get();
    }
}
