<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question;
use App\Repositories\QuestionRepository;

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

        return view('questions.index', compact('questions'));
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

        return view('questions.show', compact('question'));
    }

}
