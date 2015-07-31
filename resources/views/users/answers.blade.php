@extends('default')

@section('title', 'Ответы пользователя ' . $user->fullName)

@section('content')

    <div class="page">

        @include('users.partials.header')

        <div class="page__body">
            <ul class="content-list">

                @foreach($answers as $answer)

                    @include('answers.partials.item-short')

                @endforeach

            </ul>

            @include('partials.page.pagination', ['model' => $answers])

        </div>
    </div>

@stop