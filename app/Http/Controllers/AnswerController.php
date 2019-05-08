<?php
namespace App\Http\Controllers;

use \App\Answer;
use \App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
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
     * Do nothing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }


    /**
     * Increment an Answer's clap counter.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clap(int $id)
    {
        $answer = Answer::where('id', $id)->first();
        if ($answer)
            $answer->clap();

        return redirect()->route('questions.show', [ 'question' => $answer->question_id ])
                         ->with('message', 'You have clapped!');
    }


    /**
     * Show an answer.
     *
     * @param Answer answer
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Answer $answer)
    {
        return view('answer')->with('answer', $answer);
    }


    /**
     * Show the form to create a new answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $answer = new Answer;
        return view('answerForm', [
            'answer' => $answer,
            'question' => $answer->question,
            'edit' => false
        ]);
    }


    /**
     * Store a newly created answer.
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
                'body.required' => 'Answer text is required.',
                'body.min' => 'The answer must be at least 5 characters.',
            ]
        );

        $question = Question::where('id', request()->input('question_id'))->first();

        if (!$question)
            return redirect()->route('home')
                             ->with('message', 'Question does not exist!');

        $answer = new Answer();
        $answer->body = request()->input('body');
        $answer->user()->associate(Auth::user());
        $answer->question()->associate($question);
        $answer->save();

        return redirect()->route('questions.show', [ 'question' => $question ])
                         ->with('message', 'Answer has been created!');
    }


    /**
     * Edit a answer.
     *
     * @param Answer answer
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Answer $answer)
    {
        return view('answerForm', ['answer' => $answer, 'edit' => true ]);
    }


    /**
     * Update a answer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Answer answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $input = $request->validate(
            [
                'body' => 'required|min:5'
            ],
            [
                'body.required' => 'Answer text is required.',
                'body.min' => 'Answer text must be at least 5 characters.'
            ]
        );

        $answer->body = $request->body;
        $answer->save();

        return redirect()->route('answers.show', ['id' => $answer->id])
                         ->with('message', 'Answer has been updated!');
    }


    /**
     * Delete answer.
     *
     * @param Answer answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $question = $answer->question_id;
        $answer->delete();
        return redirect()->route('questions.show', [ 'question' => $question ])
                         ->with('message', 'Answer has been deleted!');
    }
}
