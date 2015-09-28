<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('like answer');

$answer = App\Models\Answer::get()->random();

$likes = $answer->likes->count();
$I->amOnPage('/q/'.$answer->question->id);
$I->see($answer->question->title);
$I->click('li#answer_'.$answer->id.' a.btn_like');
$I->amOnRoute('q', ['id' => $answer->question->id]);
$I->assertEquals(++$likes, $answer->likes->count());
