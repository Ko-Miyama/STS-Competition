<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function squeeze(Category $category)
    {
        return view('categories/discussion')->with([
            'category' => $category,
            'posts' => $category->getPaginateByLimit()
        ]);
    }
}
