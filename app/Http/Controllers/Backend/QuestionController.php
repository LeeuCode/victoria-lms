<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    function index(Request $request)
    {
        $subjects = Subject::all();
        $questions = null;

        if (isset($request->subject_id)) {
            $questions = Question::where('subject_id', $request->subject_id)->get();
        }

        return view('backend.questions.index', [
            'subjects' => $subjects,
            'questions' => $questions
        ]);
    }

    function view($id)
    {
        $questions = Question::where('subject_id', $id)->get();

        return view('backend.questions.view', [
            'question' => $questions,
        ]);
    }

    function create()
    {
        $subjects = Subject::all();
        return view('backend.questions.create')->withSubjects($subjects);
    }

    function store(Request $request)
    {

        $question = new Question;

        $question->title = $request->name;
        $question->subject_id = $request->subject_id;

        if (isset($request->status)) {
            $question->status = 'offline';
        } else {
            $question->status = 'online';
        }

        $question->save();

        if (isset($request->answers)) {
            foreach ($request->answers as $key => $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'name' => $answer['name'],
                    'is_correct' => ($key == 'is_correct') ? 1 : 0
                ]);
            }
        }

        return redirect()->back();
    }

    function edit(Request $request)
    {
        $question = Question::find($request->question_id);
        $subjects = Subject::all();

        return view('backend.questions.edit', [
            'question' => $question,
            'subjects' => $subjects
        ]);
    }
}
