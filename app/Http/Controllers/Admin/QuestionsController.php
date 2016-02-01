<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Tag;
use App\Toster\Pagination\AdminPaginator;

class QuestionsController extends Controller
{
    public function index()
    {

    	$questions = Question::with('tags', 'user', 'answersCount')->orderBy('created_at', 'desc')->paginate(15);
    	$pagination = new AdminPaginator($questions);

    	return view('questions.index')->with(['questions' => $questions, 'pagination' => $pagination]);
    }

    public function edit($id)
    {
    	$question = Question::findOrFail($id);
    	$tags = Tag::all();

    	return view('questions.edit')->with(['question' => $question, 'tags' => $tags]);
    }
}
