<?php

namespace Creational\AbstractFactory;
class BENZCar implements CarInterface
{

    public function __construct(
        private $price,
        private $tax
    ) {}

    public function calculatePrice()
    {
        return $this->price + $this->tax + 200000;
    }
}