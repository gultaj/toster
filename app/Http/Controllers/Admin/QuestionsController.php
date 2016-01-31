<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function index()
    {

    	$questions = Question::orderBy('created_at', 'desc')->paginate(15);

    	return view('questions.index')->with(['questions' => $questions]);
    }
}
