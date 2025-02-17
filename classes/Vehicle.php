<?php
class Vehicle {
    
    // Properties

    private string $name;
    private int $wheels;
    private string $colour;
    private ?string $owner;
    private int $maxSpeed = 250;

    // Constructor

    public function __construct(string $name, int $wheels, string $colour = "black", ?string $owner, ?int $maxSpeed) {
        $this->name = $name;
        $this->wheels = $wheels;
        $this->colour = $colour;
        $this->owner = $owner;
        $this->maxSpeed = $maxSpeed;
    }  

    // Getters & Setters

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): Vehicle {
        $this->name = $name;
        return $this;
    }
    public function getWheels(): int {
        return $this->wheels;
    }
    public function setWheels(int $wheels): Vehicle {
        $this->wheels = $wheels;
        return $this;
    }
    public function getColour(): string {
        return $this->colour;
    }
    public function setColour(string $colour): Vehicle {
        $this->colour = $colour;
        return $this;
    }
    public function getOwner(): ?int {
        return $this->owner;
    }
    public function setOwner(?int $owner): Vehicle {
        $this->owner = $owner;
        return $this;
    }
    public function getMaxSpeed(): int {
        return $this->maxSpeed;
    }
    public function setMaxSpeed(int $maxSpeed): Vehicle {
        $this->maxSpeed = $maxSpeed;
        return $this;
    }

    // Methods

    public function detect(): string {
        switch ($this->wheels) {
            case 2:
                return "bike";
            case 4:
                return "car";
            default:
                return "Unidentified";
        }
    }

    public function boost(int $boost = 50): Vehicle {
        $this->maxSpeed += $boost;
        return $this;
    }

    public function faster(Vehicle $vehicle): Vehicle | string {
        $diff = $this->getMaxSpeed() - $vehicle->getMaxSpeed();
        return match ($diff) {
            $diff > 0 => $this,
            $diff < 0 => $vehicle,
            $diff = 0 => 'Vehicles are equally fast'
        };
    }
}