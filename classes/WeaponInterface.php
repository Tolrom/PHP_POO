<?php
interface WeaponInterface {
    protected function display(): void;
    protected function attack(): int;
}