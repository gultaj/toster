@extends('default')

@section('title', 'Вопросы пользователя ' . $user->fullName)

@section('content')

    <div class="page">

        @include('users.partials.header')

        <div class="page__body">
            <ul class="content-list">

                @foreach($questions as $question)

                    @include('questions.partials.item', ['firstTag' => $question->tags->first()])

                @endforeach

            </ul>

            @include('partials.page.pagination', ['model' => $questions])

        </div>
    </div>

@stop