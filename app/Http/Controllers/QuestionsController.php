<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use App\Jobs\IncrementViewQuestion;

class QuestionsController extends Controller
{

    protected $question;

    public function __construct(QuestionRepository $question)
    {
        $this->question = $question;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = $this->question->index();
        //$questions->setPath('questions/latest/');
        // dd($questions);
        return view('questions.index', [
            'questions' => $questions
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $question = $this->question->show($id);

        $this->dispatch(new IncrementViewQuestion($question));

        return view('questions.show', compact('question'));
    }

}
