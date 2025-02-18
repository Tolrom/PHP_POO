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
    abstract public function attack(): int;

}