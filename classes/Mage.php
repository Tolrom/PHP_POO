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
    protected function display(): void {
        echo "Mage";
    }

    public function attack(): int {
        if($this->getWeapon() instanceof Fireball) {
            $this->setMana($this->getMana() - 1);
        }
        return $this->getWeapon()->attack();
    }
}