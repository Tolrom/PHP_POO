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

    
    protected function display(): void {
        echo "Spell";
    }

    protected function attack(): int {
        $dmg = rand(4,8);
        return $dmg;
    }
}