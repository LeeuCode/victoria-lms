<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\User;

class ReceiptController extends Controller
{
    function index(Request $request)
    {
        $users = User::where('type', 'student')->get();

        return view('backend.receipts.index', [
            'users' => $users
        ]);
    }

    function show($id) {
        $users = User::where('type', 'student')->get();
        // $subjects = Subject::all();
        $student = User::find($id);

        return view('backend.receipts.show', [
            "users" => $users,
            // "subjects" => $subjects,
            "student" => $student
        ]);
    }
}
