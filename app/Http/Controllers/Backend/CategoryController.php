<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::paginate(15);
        return view('backend.categories.index')->withCategories($categories);
    }

    function store(Request $request)
    {
        $data = $request->except(['_token']);
        Category::create($data);

        return redirect()->back();
    }
}
