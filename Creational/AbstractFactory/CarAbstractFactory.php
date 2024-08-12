<?php

namespace Creational\AbstractFactory;

class CarAbstractFactory
{
    private $tax = 100000;
    private $price ;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function createBMWCar() : BMWCar
    {
        return new BMWCar($this->price);
    }

    public function createBENZCar():BENZCar
    {
        return new BENZCar($this->price , $this->tax);
    }


}