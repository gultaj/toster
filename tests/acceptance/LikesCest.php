<?php

class LikesCest
{
    public function _before(\AcceptanceTester $I)
    {
    }

    public function _after(\AcceptanceTester $I)
    {
    }

    // tests
    public function likes(\AcceptanceTester $I)
    {
        $answer = App\Models\Answer::get()->random();

        $user = App\Models\User::get()->random();

        \Auth::login($user);

        $likes = $answer->likes->count();
        $I->wantTo('like answer');
        $I->amOnRoute('q', ['id' => $answer->question->id]);
        $I->see($answer->question->title);

        $c = ($likes) ? (int)$I->grabTextFrom('li#answer_'.$answer->id.' a.btn_like .like_count') : 0;

        $I->assertEquals($likes, $c); 
        $I->click('li#answer_'.$answer->id.' a.btn_like');
        $I->amOnRoute('q', ['id' => $answer->question->id]);

        $answer = App\Models\Answer::find($answer->id);
        $I->assertEquals($likes+1, $answer->likes->count());
    }
}
