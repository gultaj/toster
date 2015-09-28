<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\AddLikeToAnswer;
use App\Jobs\RemoveLikeFromAnswer;

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

    public function like(Request $request)
    {
        $answer = Answer::findOrFail($request->input('answer_id'));

        $message = [];

        if ($answer->likes()->find(\Auth::user()->id)) {
            $this->dispatch(new RemoveLikeFromAnswer($answer, \Auth::user()));
            $message['type'] = 'dislike';
        } else {
            $this->dispatch(new AddLikeToAnswer($answer, \Auth::user()));
            $message['type'] = 'like';
        }


        if ($request->ajax()) {
            $message['count'] = $answer->likes->count();
            return $message;
        }
        
        return back();
    }

    public function removeLike(Request $request)
    {
        $answer = Answer::findOrFail($request->input('answer_id'));
        
        if ($answer->likes()->find(\Auth::user()->id)) {

        }

        $this->dispatch(new RemoveLikeFromAnswer($answer, \Auth::user()));
        
        if ($request->ajax()) {
            return $answer->likes->count();
        }
        
        return back();
    }

}
