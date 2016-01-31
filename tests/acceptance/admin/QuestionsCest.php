<?php
namespace admin;
use \AcceptanceTester;

class QuestionsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function showList(AcceptanceTester $I)
    {
        $q = \App\Models\Question::orderBy('created_at', 'desc')->first();

        $I->wantTo('show question list');
        $I->amOnRoute('admin.q');
        $I->see(htmlentities($q->title));
    }
}
