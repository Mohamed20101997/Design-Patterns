<?php

namespace Creational\AbstractFactory;
class BMWCar implements CarInterface
{
    public function __construct(
        private $price
    ) {}

    public function calculatePrice()
    {
        return $this->price + 120000;
    }
} 


