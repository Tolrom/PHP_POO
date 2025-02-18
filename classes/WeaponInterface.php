<?php
interface WeaponInterface {
    public function display(): string;
    public function attack(): int;
}