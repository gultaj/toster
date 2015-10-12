<?php
use \AcceptanceTester;

class LikesCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function likes(AcceptanceTester $I)
    {
        $answer = App\Models\Answer::get()->random();

        $user = App\Models\User::get()->random();

        \Auth::login($user);

        $likes = $answer->likes->count();
        $I->wantTo('like answer');
        $I->amOnRoute('q', ['id' => $answer->question->id]);
        $I->see($answer->question->title);
        $I->click('li#answer_'.$answer->id.' a.btn_like');
        $I->amOnRoute('q', ['id' => $answer->question->id]);
        $I->assertEquals($likes+1, $answer->likes->count());

    }
}
