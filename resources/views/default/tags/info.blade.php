@extends('default')

@section('title', 'Информация по тегу "'.$tag->title.'"')

@section('content')

    <div class="page">

        @include('tags.partials.header')

        <div class="page__body">
            
            {{ $tag->description }}

        </div>
    </div>

@stop