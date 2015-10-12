@extends('default')

@section('title', 'Теги пользователя ' . $user->nickname)

@section('content')

    <div class="page">

        @include('users.partials.header')

        <div class="page__body">

        </div>
    </div>

@stop