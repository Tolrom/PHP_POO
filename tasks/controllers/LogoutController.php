<?php 
class LogoutController extends AbstractController {

    public function logout(): void {
        session_destroy();
        $_SESSION = [];
        header('location:/php_poo/tasks');
    }

    public function render(): void {
        $this->renderHeader();
        $this->logout();
        echo $this->getListViews()['logout']->displayView();
        $this->renderFooter();
    }
}