<?php

session_start();

//? Controllers
include './controllers/AbstractController.php';
include './controllers/AccountController.php';
include './controllers/LogoutController.php';
include './controllers/ProfileController.php';
include './controllers/CategoryController.php';
include './controllers/ErrorController.php';

//? Views
include './views/ViewHeader.php';
include './views/ViewAccount.php';
include './views/ViewFooter.php';
include './views/ViewProfile.php';
include './views/ViewError.php';
include './views/ViewCategory.php';

//? Other
include 'config.php';

loadEnv(__DIR__.'/.env');

//! Controllers instantiation
$home = new AccountController(
    ['account' => new AccountModel],
    [
        'header'=>new ViewHeader(),
        'footer'=> new ViewFooter(),
        'home' => new ViewAccount()
]);
$logout =   new LogoutController([],[]);
$profile =  new ProfileController([],['header'=>new ViewHeader(),'footer'=> new ViewFooter(),'profile' => new ViewProfile()]);
$error = new ErrorController([], ['header'=>new ViewHeader(), 'footer' => new ViewFooter(), 'error' => new ViewError]);
$category = new CategoryController([],['header'=>new ViewHeader(), 'footer' => new ViewFooter() , 'cat' => new ViewCategory()]);



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
        case '/php_poo/tasks/categories':
            $category->render();
            break;
        default:
            $error->render();
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
            $error->render();
            break;
    }
}
