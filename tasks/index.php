<?php

session_start();

//? Controllers
include './controllers/AbstractController.php';
include './controllers/AccountController.php';
include './controllers/LogoutController.php';
include './controllers/ProfileController.php';

//? Views
include './views/ViewHeader.php';
include './views/ViewAccount.php';
include './views/ViewFooter.php';
include './views/ViewProfile.php';

//? Other
include 'config.php';

loadEnv(__DIR__.'/.env');


$home = new AccountController(
    ['account' => new AccountModel],
    [
        'header'=>new ViewHeader(),
        'footer'=> new ViewFooter(),
        'home' => new ViewAccount()
]);
$logout =   new LogoutController([],[]);
$profile =  
new ProfileController(
[],
[
    'header'=>new ViewHeader(),
    'footer'=> new ViewFooter(),
    'profile' => new ViewProfile(),
    ]
);

//      Analysing URL and returning components
$url = parse_url($_SERVER['REQUEST_URI']);
//      Redirecting to the root if the url has a path
$path = isset($url['path']) ? $url['path'] : '/php_poo/tasks/';

//      Logged in router
if (isset($_SESSION["pseudo"])) {
    switch ($path) {
        case '/php_poo/tasks/':
            $home->render();
            break;
        case '/php_poo/tasks/profile':
            $profile->render();
            break;
        case '/php_poo/tasks/logout':
            $logout->logout();
            break;
        default:
            $home->render();
            break;
    }
}
//  Visitor router
else {
    switch ($path) {
        case '/php_poo/tasks/':
            $home->render();
            break;
        default:
            $home->render();
            break;
    }
}
