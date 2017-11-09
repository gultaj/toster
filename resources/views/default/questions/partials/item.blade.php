<li class="content-list__item question">
    <div class="question__wrap">
        <div class="question__content">
            <ul class="question__tags question__tags_short">
                <li class="question__tags-item">
                    <i class="icon-tag"></i>
                    <a href="{{ route('tag', ['slug' => $firstTag->slug]) }}">{{ $firstTag->title }}</a>
                </li>
                @if($count = ($question->tags->count() - 1))
                    <li class="question__tags-item_more">+{{ $count }} ещё</li>
                @endif
            </ul>
            <h2 class="question__title">
                <a href="{{ route('q', ['id' => $question->id]) }}" class="question__title-link">{{ $question->title }}</a>
            </h2>
            <ul class="question__attr">
                <li>{{ $question->subscribersCountHumans }}</li> 
                <li>{{ $question->created_at->diffForHumans() }}</li> 
                <li>{{ $question->veiwCountHumans }}</li>
            </ul>
        </div>
    </div>
    <div class="question__answers-count">
    @if($question->is_resolved)
        <a href="{{ route('q', ['id' => $question->id])}}#answers" class="answer-counter answer-counter_solved">
            <div class="answer-counter__count"><i class="icon-ok"></i>{{ $question->answersCount }}</div>
    @else
        <a href="{{ route('q', ['id' => $question->id])}}#answers" class="answer-counter ">
            <div class="answer-counter__count">{{ $question->answersCount }}</div>
    @endif
            <div class="answer-counter__value">{{ count_answers($question->answersCount) }}</div>
        </a>
    </div>
</li>