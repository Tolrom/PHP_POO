<?php
class ProfileController extends AbstractController {

    private ViewProfile $viewProfile;  
    
    public function render(): void {
        $this->renderHeader();
        // $this->displayProfile();
        echo $this->getListViews()['profile']->displayView();
        $this->renderFooter();
    }
}