<?php
require "./classes/AbstractCharacter.php";
require "./classes/Spell.php";
require "./classes/Bow.php";
require "./classes/Sword.php";
require "./classes/Mage.php";
require "./classes/Rogue.php";
require "./classes/Warrior.php";

$sword = new Sword(10);
$bow = new Bow(10);
$spell = new Spell();

$rogue = new Rogue("Robin", $bow);
$war = new Warrior("Garrosh", $sword);
$mage = new Mage("Merlin", $spell, 10);

$goblin = new Rogue("Zog", $spell);


$mage->attack();
$rogue->attack();
$war->attack();
$goblin->attack();