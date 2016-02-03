<?php
namespace admin;
use \AcceptanceTester;
use \App\Models\Question;

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
        $q = Question::orderBy('created_at', 'desc')->first();

        $I->wantTo('show question list');
        $I->amOnRoute('admin.q.index');
        $I->see(htmlentities($q->title));
    }

    public function editItem(AcceptanceTester $I)
    {
        $q = Question::get()->random();

        $I->wantTo('show edit page');
        $I->amOnRoute('admin.q.edit', ['id' => $q->id]);
        $I->seeInField('title', $q->title);

    }
}
