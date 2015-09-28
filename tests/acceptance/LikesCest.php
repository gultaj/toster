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
    public function like(AcceptanceTester $I)
    {
        $answer = App\Models\Answer::get()->random();

        $likes = $answer->likes->count();
        $I->wantTo('like answer');
        $I->amOnPage('/q/'.$answer->question->id);
        $I->see($answer->question->title);
        $I->click('li#answer_'.$answer->id.' a.btn_like');
        $I->amOnRoute('q', ['id' => $answer->question->id]);
        $I->assertEquals(++$likes, $answer->likes->count());

    }
}
