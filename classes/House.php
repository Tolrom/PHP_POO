<?php

class House{

    // Properties
    private string $name;
    private float $length;
    private float $width;
    private int $floors;

    // Constructor
    public function __construct(string $name,float $length,float $width, int $floors = 1){
        $this->name = $name;
        $this->length = $length;
        $this->width = $width;
        $this->floors = $floors;
    }

    // Getters & Setters

    public function getName(): string{
        return $this->name;
    }
    public function setName($name): void{
        $this->name = $name;
    }
    public function getLength(): float{
        return $this->length;
    }
    public function setLength($length): void{
        $this->length = $length;
    }
    public function getWidth(): float{
        return $this->width;
    }
    public function setWidth($width): void{
        $this->width = $width;
    }
    public function getFloors(): int{
        return $this->floors;
    }
    public function setFloors(int $floors): void{
        $this->floors = $floors;
    }

    // Methods

    public function getArea(): float {
        return $this->width * $this->length * $this->floors;
    }


}