<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Exam;
use App\Models\Receipt;

class ExamController extends Controller
{
    function booking(Request $request)
    {
        $users = User::where('type', 'student')->get();

        if ($request->student_id || $request->student_select_id) {
            if (isset($request->student_id)) {
                $id = $request->student_id;
            }

            if (isset($request->student_select_id)) {
                $id = $request->student_select_id;
            }

            return redirect()->to(route('admin.exam.booking.student', ['id' => $id]));
        }

        return view('backend.exam-booking.index', [
            'users' => $users
        ]);
    }
    function bookingById($id)
    {
        $users = User::where('type', 'student')->get();
        $subjects = Subject::all();
        $student = User::find($id);

        return view('backend.exam-booking.student', [
            "users" => $users,
            "subjects" => $subjects,
            "student" => $student
        ]);
    }
    function storeBooking(Request $request)
    {
        $exam = new Exam;

        $subject = Subject::find($request->subject_id);

        $user = User::find($request->user_id);

        $exam->subject_id = $subject->id;
        $exam->user_id = $request->user_id;
        $exam->exam_date = $request->exam_date;
        $exam->exam_duration = $subject->duration;
        $exam->status = 'open';

        if ($user->balance >=  $subject->price) {

            $user->balance = ($user->balance - $subject->price);
            $user->save();

            $exam->save();

            $receipt = new Receipt;

            $receipt->user_id = $user->id;
            $receipt->description = 'Exam Fee Gross Value of : ' . $subject->name;
            $receipt->amount = $subject->price;
            $receipt->status = 'paid';
            $receipt->save();
        }
    }

    function exemptions()
    {
        return view('backend.exemptions.index');
    }

    function exemptionsById($id)
    {
        return view('backend.exam-booking.student');
    }
}
