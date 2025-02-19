<?php
class ProfileController extends AbstractController {

    //! Attributes
    private ViewProfile $viewProfile; 

    //! Getters & Setters 
    /**
     * Get the value of viewProfile
     *
     * @return ViewProfile
     */
    public function getViewProfile(): ViewProfile {
        return $this->viewProfile;
    }

    /**
     * Set the value of viewProfile
     *
     * @param ViewProfile $viewProfile
     *
     * @return self
     */

    //! Methods
    public function render(): void {
        $this->renderHeader();
        echo $this->getListViews()['profile']->displayView();
        $this->renderFooter();
    }
}