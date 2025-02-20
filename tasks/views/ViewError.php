<?php
class ViewError implements ViewInterface {
    public function displayView(): string {
        return "<h1 style='text-align: center; margin: 2em;' >The page you are looking for doesn't exist!</h1>";
    }
}