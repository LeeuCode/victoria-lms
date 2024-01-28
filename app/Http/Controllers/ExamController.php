<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\ExamAnswer;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Subject;

class ExamController extends Controller
{
    function index($id)
    {
        // Find Exam by id.
        $exam = Exam::find($id);

        // Get frist subject from the exam.
        $subject = $exam->subject()->first();

        $examAnswer =  $exam->examAnswer()->pluck('question_id')->toArray();

        $allQuestions = $subject->question()->whereNotIn('id', $examAnswer);

        $question = $subject->question()
            ->whereNotIn('id', $examAnswer)
            ->inRandomOrder()->first();

        $bookmark = 0;

        if ($allQuestions->count() == 0) {
            $bookmarkIds = $exam->examAnswer()
                ->where('mark', 'bookmark')
                ->pluck('question_id')
                ->toArray();

            // dd($bookmarkIds);
            $question = $subject->question()->whereIn('id', $bookmarkIds)
                ->inRandomOrder()->first();

            $bookmark = 1;
        }

        if (!$question) {
            dd($question);
        }

        return view('frontend.exam.index', [
            'question' => $question,
            'exam' => $exam,
            'bookmark' => $bookmark
        ]);
    }

    function store(Request $request)
    {
        $exam = Exam::find($request->exam_id);

        $answer = Answer::where('question_id', $request->question_id)->where('is_correct', 1)->first();

        $examAnswerCount = ExamAnswer::where('exam_id', $request->exam_id)
            ->where('question_id', $request->question_id);

        if ($answer->id == $request->answer_id) {
            $mark = 'correct';
            $exam->per_right_answers = ($exam->per_right_answers + 1);
        } else {
            $mark = 'incorrect';
            $exam->per_wrong_answers = ($exam->per_wrong_answers + 1);
        }

        $exam->save();

        if ($examAnswerCount->count() == 1) {

            $examAnswerCount->update([
                'mark' => $mark,
                'answer_id' => $answer->id,
                'user_answer' => $request->answer_id
            ]);
        } else {
            $examAnswer = new ExamAnswer;
            $examAnswer->exam_id = $request->exam_id;
            $examAnswer->question_id = $request->question_id;
            $examAnswer->answer_id = $answer->id;
            $examAnswer->user_answer = $request->answer_id;
            $examAnswer->mark = $mark;

            $examAnswer->save();
        }

        return redirect()->back();
    }

    function destroyEaxm()
    {
        echo 'Destroy Date';
    }

    function bookmark($id, Request $request)
    {
        $examAnswer = new ExamAnswer;

        $examAnswer->exam_id = $request->exam_id;
        $examAnswer->question_id = $id;
        $examAnswer->answer_id = 0;
        $examAnswer->user_answer = 0;
        $examAnswer->mark = 'bookmark';

        $examAnswer->save();

        return redirect()->back();
    }

    function updateTime($id)
    {
        // header('Content-Type: text/event-stream');
        // header('Cache-Control: no-cache');

        $exam = Exam::find($id);

        if ($exam->exam_duration != 0) {

            $exam->exam_duration = ($exam->exam_duration - 1);

            $exam->save();
        }

        echo $exam->exam_duration;
        // flush();
    }
}
