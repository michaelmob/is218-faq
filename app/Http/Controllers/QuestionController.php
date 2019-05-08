<?php

namespace App\Http\Controllers;

use \App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show a paginated view of all questions.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(6);
        return view('home')->with('questions', $questions);
    }

    /**
     * Show a question.
     *
     * @param Question question
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Question $question)
    {
        return view('question')->with('question', $question);
    }


    /**
     * Show the form to create a new question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question;
        return view('questionForm', [
            'question' => $question, 'edit' => false
        ]);
    }


    /**
     * Store a newly created question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate(
            [
                'body' => 'required|min:5',
            ], [
                'body.required' => 'Question text is required.',
                'body.min' => 'The question must be at least 5 characters.',
            ]
        );

        $question = new Question();
        $question->body = request()->input('body');
        $question->user()->associate(Auth::user());
        $question->save();

        return redirect()->route('questions.show', [ 'question' => $question ])
                         ->with('message', 'Question has been created!');
    }


    /**
     * Edit a question.
     *
     * @param Question question
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Question $question)
    {
        return view('questionForm', ['question' => $question, 'edit' => true ]);
    }


    /**
     * Update a question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Question  question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $input = $request->validate(
            [
                'body' => 'required|min:5'
            ],
            [
                'body.required' => 'Question text is required.',
                'body.min' => 'Quest text must be at least 5 characters.'
            ]
        );

        $question->body = $request->body;
        $question->save();

        return redirect()->route('questions.show', ['id' => $question->id])
                         ->with('message', 'Question has been updated!');
    }


    /**
     * Delete a question.
     *
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('home')
                         ->with('message', 'Question has been deleted!');
    }
}
