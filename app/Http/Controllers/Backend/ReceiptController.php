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

        if ($request->student_id || $request->student_select_id) {
            if (isset($request->student_id)) {
                $id = $request->student_id;
            }

            if (isset($request->student_select_id)) {
                $id = $request->student_select_id;
            }

            return redirect()->to(route('admin.receipt.show', ['id' => $id]));
        }

        return view('backend.receipts.index', [
            'users' => $users
        ]);
    }

    function show($id) {
        $users = User::where('type', 'student')->get();
        // $subjects = Subject::all();
        $student = User::find($id);

        // $resp = Receipt::

        return view('backend.receipts.show', [
            "users" => $users,
            // "subjects" => $subjects,
            "student" => $student
        ]);
    }
}
