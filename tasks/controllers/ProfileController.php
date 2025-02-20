<?php
class ProfileController extends AbstractController {

    //! Methods
    public function render(): void {
        $this->renderHeader();
        echo $this->getListViews()['profile']->displayView();
        $this->renderFooter();
    }
}