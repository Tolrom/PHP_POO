<?php
require "WeaponInterface.php";

abstract class AbstractCharacter implements WeaponInterface {

    // Properties

    private string $name;
    private WeaponInterface $weapon;
    private string $type;

    // Constructor

    public function __construct(string $name, WeaponInterface $weapon, string $type) {
        $this->name = $name;
        $this->weapon = $weapon;
        $this->type = $type;
    }

    // Getters & Setters 

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function getWeapon(): WeaponInterface {
        return $this->weapon;
    }
    public function setWeapon(WeaponInterface $weapon): void {
        $this->weapon = $weapon;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setType(string $type): void {
        $this->type = $type;
    }
    

    // Methods

    abstract public function display(): string;
    public function attack(): int{
        if($this->getWeapon() instanceof Spell) {
            // var_dump($this);
            if($this->getType() === "Mage"){
                $this->setMana($this->getMana() - 1);
                echo $this->getName()." the ".$this->getType()." spent 1 mana.<br> ";
                echo $this->getMana()." mana left. <br>";
            }
            else {
                echo "Only a mage can cast a spell!<br>";
                return 0;
            }
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