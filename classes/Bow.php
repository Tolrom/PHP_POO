<?php
class Bow implements WeaponInterface {

    // Properties
    private int $ammo = 10;
    private string $type;

    // Constructor
    public function __construct(int $ammo) {
        $this->ammo = $ammo;
        $this->type = "Bow";
    }
    
    // Getters & Setters 
    public function getAmmo(): int {
        return $this->ammo;
    }
    public function setAmmo(int $ammo): Bow {
        $this->ammo = $ammo;
        return $this;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setType(string $type): Bow {
        $this->type = $type;
        return $this;
    }

    
    public function display(): string {
        return "Bow";
    }

    public function attack(): int {
        if ($this->getAmmo() > 0) {
            $dmg = rand(1,10);
            $this->setAmmo($this->getAmmo() - 1);
        }
        else {
            $dmg = 0;
            echo "Out of ammo!";
        }
        return $dmg;
    }
}