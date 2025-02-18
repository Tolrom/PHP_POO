<?php
class Mage extends AbstractCharacter {
    private int $mana;

    public function __construct(string $nom, WeaponInterface $weapon, int $mana) {
        parent::__construct($nom, $weapon, "Mage");
        $this->mana = $mana;
    }
    public function getMana(): int {
        return $this->mana;
    }
    public function setMana(int $mana): Mage {
        $this->mana = $mana;
        return $this;
    }
    public function display(): string {
        return "Mage";
    }

    public function attack(): int {
        if($this->getWeapon() instanceof Spell) {
            $this->setMana($this->getMana() - 1);
            echo $this->getName()." the ".$this->getType()." spent 1 mana.<br> ";
            echo $this->getMana()." mana left. <br>";
        }
        echo $this->getName()." the ".$this->getType()." dealt ".$this->getWeapon()->attack(). " damage with the ".$this->getWeapon()->display().".<br>";
        return $this->getWeapon()->attack();
    }
}