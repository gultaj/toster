<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function questions($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $questions = $tag->questions()->with('tags', 'answersCount', 'subscribersCount')->paginate(15);

        return view('tags.show', compact('questions', 'tag'))->with('menu_items', $this->buildMenu($tag));
    }

    public function info($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $questions = $tag->questions()->with('answersCount', 'subscribersCount')->get();

        return view('tags.info', compact('questions', 'tag'))->with('menu_items', $this->buildMenu($tag));
    }

    public function interest($slug)
    {

    }

    public function withoutAnswer($slug)
    {

    }

    public function buildMenu($tag = null)
    {
        return [
            'Информация' => route('tag.info', ['slug' => $tag->slug]),
            'Новые вопросы' => route('tag', ['slug' => $tag->slug]),
            'Интересные' => route('tag.interest', ['slug' => $tag->slug]),
            'Без ответа' => route('tag.wo_answer', ['slug' => $tag->slug]),
            'Подписчики' => '#'
        ];
    }


}
