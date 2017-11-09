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
            {{ $answers->links() }}
        </div>
    </div>

@stop