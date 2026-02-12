<?php

namespace Tests;
use Creational\Builder\BENZCarBuilder;
use Creational\Builder\BMWCarBuilder;
use Creational\Builder\CarProducer;
use Creational\Builder\Models\BENZCar;
use Creational\Builder\Models\BMWCar;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function test_produce_bmw_car()
    {
        $BMWBuilder = new BMWCarBuilder();
        $carProduce = new CarProducer($BMWBuilder);
        $myCar = $carProduce->produceCar();
        $this->assertInstanceOf(BMWCar::class , $myCar);
    }

    public function test_produce_benz_car()
    {
        $BENZBuilder = new BENZCarBuilder();
        $carProduce = new CarProducer($BENZBuilder);
        $myCar = $carProduce->produceCar();
        $this->assertInstanceOf(BENZCar::class , $myCar);
    }
}