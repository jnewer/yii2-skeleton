<?php

namespace tests\codeception\frontend\functional;

use Yii;
use tests\codeception\frontend\FunctionalTester;

/** @var $scenario \Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see('My Company');
$I->seeLink('About');
$I->click('About');
$I->see('This is the About page.');
