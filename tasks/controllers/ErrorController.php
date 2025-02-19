<?php
class ErrorController extends AbstractController {

    //! Attributes
    private ViewError $viewError;

    //! Getters & Setters
    /**
     * Get the value of viewError
     *
     * @return ViewError
     */
    public function getViewError(): ViewError {
        return $this->viewError;
    }

    /**
     * Set the value of viewError
     *
     * @param ViewError $viewError
     *
     * @return self
     */
    public function setViewError(ViewError $viewError): self {
        $this->viewError = $viewError;
        return $this;
    }

    //! Methods
    public function render(): void {
        $this->renderHeader();
        echo $this->getListViews()['error']->displayView();
        $this->renderFooter();
    }
}