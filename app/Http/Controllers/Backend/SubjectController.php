<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subject;

class SubjectController extends Controller
{
    function index()
    {
        $categories = Category::all();
        $subjects = Subject::paginate(15);

        return view('backend.subjects.index', [
            'categories' => $categories,
            'subjects' => $subjects
        ]);
    }

    function store(Request $request)
    {
        $data = $request->except(['_token']);
        Subject::create($data);

        return redirect()->back();
    }
}
