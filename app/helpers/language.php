<?php

function ru_count($number) {
    return (($number % 10 == 1) && ($number % 100 != 11))
        ? 0
        : ((($number % 10 >= 2)
        && ($number % 10 <= 4)
        && (($number % 100 < 10)
            || ($number % 100 >= 20)))
        ? 1
        : 2
    );
}

function count_answers($number)
{
    return \Lang::choice('count.answers', ru_count($number));
}

function count_comments($number)
{
    return \Lang::choice('count.comments', ru_count($number));
}

function count_questions($number)
{
    return \Lang::choice('count.questions', ru_count($number));
}

function count_subscribers($number)
{
    return \Lang::choice('count.subscribers', ru_count($number));
}