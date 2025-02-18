<?php
class ViewAccount implements ViewInterface {

    //! Properties
    private ?string $form;
    private ?string $listUsers;

    //! Getters & Setters

    /**
     * Get the value of form
     *
     * @return string
     */
    public function getForm(): string {
        return $this->form;
    }

    /**
     * Set the value of form
     *
     * @param string $form
     *
     * @return self
     */
    public function setForm(string $form): self {
        $this->form = $form;
        return $this;
    }
    
    /**
     * Get the value of listUsers
     *
     * @return ?string
     */
    public function getListUsers(): ?string {
        return $this->listUsers;
    }

    /**
     * Set the value of listUsers
     *
     * @param ?string $listUsers
     *
     * @return self
     */
    public function setListUsers(?string $listUsers): self {
        $this->listUsers = $listUsers;
        return $this;
    }

    //! Render method
    public function displayView(): string {
        ob_start();
        echo $this->getForm();
?>
    <section>
        <h1>Users List</h1>
        <ul>
            <?php echo $this->getListUsers() ?>
        </ul>
    </section>
<?php
    $view = ob_get_clean();
    return $view;
    }
}