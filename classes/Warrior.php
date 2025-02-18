<?php
class Warrior extends AbstractCharacter {
    public function __construct(string $nom, WeaponInterface $weapon) {
        parent::__construct($nom, $weapon, "Warrior");
    }
    public function display(): string {
        return "Warrior";
    }

    public function attack(): int {
        if($this->getWeapon() instanceof Spell) {
            echo "Only a mage can cast a spell!<br>";
            return 0;
        }
        echo $this->getName()." the ".$this->getType()." dealt ".$this->getWeapon()->attack(). " damage with the ".$this->getWeapon()->display().".<br>";
        return $this->getWeapon()->attack();
    }
}