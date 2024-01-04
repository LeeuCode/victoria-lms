<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Exam;
use App\Models\Answer;
use DB;

class ExamController extends Controller
{
    function index($id)
    {
        $exam = Exam::find($id);

        $subject = $exam->subject()->first();

        $examAnswer =  $exam->examAnswer()->pluck('question_id')->toArray();

        $question = $subject->question()->whereNotIn('id', $examAnswer)->inRandomOrder()->first();

        // Cookie::queue(Cookie::make('exam', 'value', 30));

        setcookie("exam", 'true');

        return view('frontend.exam.index', [
            'question' => $question,
            'exam' => $exam
        ]);


    }

    function store(Request $request) {

        // dd($_COOKIE['exam']);

        $answer = Answer::where('question_id', $request->question_id)->where('is_correct', 1)->first();

        if ($answer->id == $request->answer_id) {
            echo 'correct';
        } else {
            echo 'incorrect';
        }
    }

    function destroyEaxm()  {
        echo 'Destroy Date';
    }
}
