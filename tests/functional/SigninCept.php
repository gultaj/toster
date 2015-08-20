<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('login');

$I->amOnRoute('auth.login');
$I->see('Вход');
// $I->fillFild(['name' => 'email'], )

$user = factory('App\Models\User')->create();

$I->seeRecord('users', [
    'nickname' => $user->nickname
]);

// $I->see($user->nickname);

