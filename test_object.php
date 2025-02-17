<?php
include "./classes/House.php";
include "./classes/Vehicle.php";

    
$house1 = new House("villa", 21.4, 12.6, 2);

$vehicle1 = new Vehicle("Mercedes CLK", 4, "gray", "Maxime", 250 );

$vehicle2 = new Vehicle("Honda CBR", 2, "red", "Yoann", 280);

?>

<h1>Test objects</h1>

<h2>Houses</h2>
<p>
    The
    <?= $house1->getName() ?>
    area is
    <?= $house1->getArea() ?>
    m²
</p>

<h2>Vehicles</h2>
<p>
    The
    <?= $vehicle1->getName() ?>
    is a 
    <?= $vehicle1->detect() ?>
    .
</p>
<p>
    The
    <?= $vehicle2->getName() ?>
    is a 
    <?= $vehicle2->detect() ?>
    .
</p>
<?php $vehicle1->boost() ?>
<h5>Boosting complete</h5>

<p>
    The
    <?= $vehicle1->getName() ?>
    new speed is 
    <?= $vehicle1->getMaxSpeed() ?>
    .
</p>

<h5>Speed comparison complete</h5>
<p> 
    The
    <?= 
    gettype($vehicle1->faster($vehicle2)) == "string" ? 
    $vehicle1->faster($vehicle2) : 
    $vehicle1->faster($vehicle2)->getName() ?>
</p>