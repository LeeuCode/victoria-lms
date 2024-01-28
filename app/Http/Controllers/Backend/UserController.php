<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function students(Request $request)
    {
        $users = User::where('type', 'student')->get();

        if ($request->student_id || $request->student_select_id) {
            if (isset($request->student_id)) {
                $id = $request->student_id;
            }

            if (isset($request->student_select_id)) {
                $id = $request->student_select_id;
            }

            return redirect()->to(route('admin.student.show', ['id' => $id]));
        }

        return view('backend.students.index', [
            'users' => $users
        ]);
    }

    function showStudent($id)
    {
        $users = User::where('type', 'student')->get();
        $student = User::find($id);

        // dd(Crypt::decrypt($student->password));

        return view('backend.students.show', [
            'users' => $users,
            'student' => $student
        ]);
    }
}
