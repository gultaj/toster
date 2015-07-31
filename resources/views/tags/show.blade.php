@extends('default')

{{-- @section('title', $question->title) --}}

@section('content')

    <div class="page">

        @include('tags.partials.header')

        <div class="page__body">
            <ul class="content-list">

                @foreach($questions as $question)

                    @include('questions.partials.item', ['firstTag' => $tag])

                @endforeach

            </ul>

            @include('partials.page.pagination', ['model' => $questions])

        </div>
    </div>

@stop