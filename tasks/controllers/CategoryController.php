<?php
class CategoryController extends AbstractController {
    
    public function render(): void {
        $this->renderHeader();
        echo $this->getListViews()['cat']->displayView();
        $this->renderFooter();
    }
}