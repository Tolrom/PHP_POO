<?php

include 'config.php';
include './controllers/AbstractController.php';
include './views/ViewHeader.php';
include './views/ViewAccount.php';
include './views/ViewFooter.php';
include './controllers/AccountController.php';

loadEnv(__DIR__.'/.env');


$home = new AccountController(
    ['account' => new AccountModel],
    [
        'header'=>new ViewHeader(),
        'footer'=> new ViewFooter(),
        'home' => new ViewAccount()
    ]);
$home->render();