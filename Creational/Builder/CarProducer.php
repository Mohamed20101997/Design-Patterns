<?php

namespace Creational\Builder;

use Creational\Builder\Models\Car;

class CarProducer
{

    /**
     * @var CarBuilderInterface $builder
     */
    private $builder;
    public function __construct(CarBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return Car
     */
    public function produceCar() : Car{
        $this->builder->createCar();
        $this->builder->addEngine();
        $this->builder->addDoors();
        $this->builder->addBody();
        $this->builder->addWheels();
        return  $this->builder->getCar();
    }


}