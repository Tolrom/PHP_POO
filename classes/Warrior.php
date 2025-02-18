<?php
class Warrior extends AbstractCharacter {
    public function __construct(string $nom, WeaponInterface $weapon) {
        parent::__construct($nom, $weapon, "Warrior");
    }
    public function display(): string {
        return "Warrior";
    }

}