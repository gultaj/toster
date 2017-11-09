@extends('default')

@section('title', 'Новые вопросы по тегу "'.$tag->title.'"')

@section('content')

    <div class="page">

        @include('tags.partials.header')

        <div class="page__body">
            <ul class="content-list">

                @foreach($questions as $question)

                    @include('questions.partials.item', ['firstTag' => $tag])

                @endforeach

            </ul>
            {{ $questions->links() }}
        </div>
    </div>

@stop