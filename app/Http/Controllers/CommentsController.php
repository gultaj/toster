<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;

class CommentsController extends Controller
{
    public function comment(Request $request)
    {
    	if ($request->has('answer_id')) {
    		$answer = Answer::find($request->input('answer_id'));
    		$comment = $answer->comments()->create(['body' => $request->input('body')]);
    		$comment->user()->associate(\Auth::user())->save();
    	} else if($request->has('question_id')) {
    		$question = Question::find($request->input('question_id'));
    		$comment = $question->comments()->create(['body' => $request->input('body')]);
    		$comment->user()->associate(\Auth::user())->save();
    	}
    	return back();
    }
}
