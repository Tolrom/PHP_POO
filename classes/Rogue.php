<?php
class Rogue extends AbstractCharacter {

    public function __construct(string $nom, WeaponInterface $weapon) {
        parent::__construct($nom, $weapon, "Rogue");
    }
    public function display(): string {
        return "Rogue";
    }

    public function attack(): int {
        if($this->getWeapon() instanceof Spell) {
            echo "Only a mage can cast a spell!<br>";
            return 0;
        }
        if($this->getWeapon() instanceof Bow) {
            $this->getWeapon()->setAmmo($this->getWeapon()->getAmmo() - 1);
            echo $this->getName()." the ".$this->getType()." shot an arrow.<br> ";
            echo $this->getWeapon()->getAmmo() ." arrows left. <br>";
        }
        echo $this->getName()." the ".$this->getType()." dealt ".$this->getWeapon()->attack(). " damage with the ".$this->getWeapon()->display().".<br>";
        return $this->getWeapon()->attack();
    }
}