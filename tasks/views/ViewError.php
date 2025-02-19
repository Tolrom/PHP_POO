<?php
class ViewError implements ViewInterface {
    public function displayView(): string {
        return "<p>Erreur!</p>";
    }
}