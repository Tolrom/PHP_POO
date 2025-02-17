<?php
include "./classes/AbstractCharacter.php";
include "./classes/WeaponInterface.php";
include "./classes/Fireball.php";
include "./classes/Bow.php";
include "./classes/Sword.php";
include "./classes/Mage.php";
include "./classes/Rogue.php";
include "./classes/Warrior.php";

$sword = new Sword(10);
$bow = new Bow(10);
$spell = new Spell();

$rogue = new Rogue("Robin", $bow, "Rogue");
$war = new Warrior("Garrosh", $sword, "Warrior");
$mage = new Mage("Merlin", $spell, 10);

$mage->attack();
$rogue->attack();
$war->attack();