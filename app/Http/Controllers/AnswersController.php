<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $question = Answer::find($request->answer_id)->question()->full()->first();

        return view('questions.show', compact('question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

}
