<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function categoryList()
    {
        return view('admin.category.list');
    }
}
