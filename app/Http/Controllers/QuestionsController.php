<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::with('tags', 'answersCount', 'subscribersCount')->paginate(15);
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
        $question = Question::full()->findOrFail($id);

        return view('questions.show', compact('question'));
    }

}
