<?php
class Warrior extends AbstractCharacter {
    protected function display(): void {
        echo "Warrior";
    }

    public function attack(): int {
        return $this->getWeapon()->attack();
    }
}