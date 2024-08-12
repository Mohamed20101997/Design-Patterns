<?php

namespace Tests;

use Creational\AbstractFactory\BENZCar;
use Creational\AbstractFactory\BMWCar;
use Creational\AbstractFactory\CarAbstractFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function test_can_create_bmw_car()
    {
        $carFactory = new CarAbstractFactory(200000);
        $myCar = $carFactory->createBMWCar();

        $this->assertInstanceOf(BMWCar::class , $myCar);
    }

    public function test_can_create_benz_car()
    {
        $carFactory = new CarAbstractFactory(200000);
        $myCar = $carFactory->createBENZCar();

        $this->assertInstanceOf(BENZCar::class, $myCar);
    }
}