<?php
class Rogue extends AbstractCharacter {
    protected function display(): void {
        echo "Rogue";
    }

    public function attack(): int {
        return $this->getWeapon()->attack();
    }
}