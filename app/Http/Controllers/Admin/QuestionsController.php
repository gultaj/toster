<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Tag;
use App\Toster\Pagination\AdminPaginator;
use App\Http\Requests\Admin\QuestionRequest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::with('tags', 'user', 'answersCount')->orderBy('created_at', 'desc')->paginate(15);
        $pagination = new AdminPaginator($questions);

        return view('questions.index')->with(['questions' => $questions, 'pagination' => $pagination]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $tags = Tag::all();

        return view('questions.edit')->with(['question' => $question, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(QuestionRequest $request, $id)
    {
        // dd($request->only('tag_id'));
        $q = Question::findOrFail($id);
        $q->update($request->only('title', 'body'));
        $q->tags()->sync($request->only('tag_id')['tag_id']);

        \Session::flash('alerts', ['success' => 'Вопрос успешно обновлен']);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
