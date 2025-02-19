<?php
class ViewHeader implements ViewInterface {
    //! Attributes
    private ?string $nav = '';

    //! Getters & Setters 
    /**
     * Get the value of nav
     *
     * @return string
     */
    public function getNav(): string {
        return $this->nav;
    }

    /**
     * Set the value of nav
     *
     * @param string $nav
     *
     * @return self
     */
    public function setNav(?string $nav): self {
        $this->nav = $nav;
        return $this;
    }
    
    public function displayView(): string {
        ob_start();
?>  
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tasklist</title>
        <link rel="stylesheet" href="assets/style/main.css">
    </head>
    <body>
    <header>
        <nav>
            <ul>
                <li><a href="/php_poo/tasks/">Home</a></li>
                <?= $this->getNav() ?>
            </ul>
        </nav>
    </header>
<?php
    $view = ob_get_clean();
    return $view;
    }
}