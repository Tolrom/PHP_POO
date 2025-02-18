<?php
class Spell implements WeaponInterface {

    // Properties
    private string $type;

    // Constructor
    public function __construct() {
        $this->type = "Spell";
    }
    
    // Getters & Setters 
    public function getType(): string {
        return $this->type;
    }
    public function setType(string $type): Spell {
        $this->type = $type;
        return $this;
    }

    
    public function display(): string {
        return "Spell";
    }

    public function attack(): int {
        $dmg = rand(4,8);
        return $dmg;
    }
}