<?php
class ViewProfile implements ViewInterface{
    public function displayView(): string {
        return "
        Welcome $_SESSION[pseudo]
        ( $_SESSION[email] )
        ";
    }
}