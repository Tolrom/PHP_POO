<?php
class Sword implements WeaponInterface {

    // Properties
    private int $durability = 10;
    private string $type;

    // Constructor
    public function __construct(int $durability) {
        $this->durability = $durability;
        $this->type = "Sword";
    }
    
    // Getters & Setters 
    public function getDurability(): int {
        return $this->durability;
    }
    public function setDurability(int $durability): Sword {
        $this->durability = $durability;
        return $this;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setType(string $type): Sword {
        $this->type = $type;
        return $this;
    }

    
    public function display(): string {
        return "Sword";
    }

    public function attack(): int {
        $dmg = rand(1,10);
        if (rand(0, 100) <= 10){
            $this->setDurability($this->getDurability() -1);
        }
        if ($this->getDurability() <= 0){
            echo "Sword broken";
        }
        return $dmg;
    }
}