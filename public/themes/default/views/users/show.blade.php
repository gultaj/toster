@extends('default')

@section('title', 'Пользователь ' . $user->nickname)

@section('content')

    <div class="page">

        @include('users.partials.header')

        <div class="page__body">

        </div>
    </div>

@stop