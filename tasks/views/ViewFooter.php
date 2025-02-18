<?php
class ViewFooter implements ViewInterface {
    public function displayView(): string {
        ob_start();
?>
    <footer>
        <p>
            All rights reserved
        </p>
    </footer>

    </body>
    </html>
<?php
    $view = ob_get_clean();
    return $view;
    }
}