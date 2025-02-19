<?php
class CategoryController extends AbstractController {
    
    public function render(): void {
        $this->renderHeader();
        echo $this->getListViews()['category']->displayView();
        $this->renderFooter();
    }
}