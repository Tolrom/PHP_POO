<?php
class Rogue extends AbstractCharacter {

    public function __construct(string $nom, WeaponInterface $weapon) {
        parent::__construct($nom, $weapon, "Rogue");
    }
    public function display(): string {
        return "Rogue";
    }

}