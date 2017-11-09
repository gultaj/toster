@extends('default')

@section('title', 'Интересные вопросы')

@section('content')

    <div class="page">
        {{--  @include('partials.page.header')  --}}
        <div class="page__body">
        
            <ul class="content-list">
                @foreach($questions as $question)
                    
                    {{--  @include('questions.partials.item', ['firstTag' => $question->tags->first()])  --}}

                @endforeach
            </ul>
            {{--  {{ $questions->links() }}  --}}
        </div>
    </div>

@stop