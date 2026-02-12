<?php

namespace Creational\AbstractFactory;

class CarAbstractFactory
{

    public function __construct(
        private $price,
        private $tax = 100000
    ) {}

    public function createBMWCar() : BMWCar
    {
        return new BMWCar($this->price);
    }

    public function createBENZCar():BENZCar
    {
        return new BENZCar($this->price , $this->tax);
    }


}