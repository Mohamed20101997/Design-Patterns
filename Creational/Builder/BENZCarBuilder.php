<?php

namespace Creational\Builder;

use Creational\Builder\Models\BENZCar;
use Creational\Builder\Models\Car;

class BENZCarBuilder implements CarBuilderInterface
{

    /**
     * @var Car $type
     */
    private $type;
    public function createCar()
    {
        $this->type = new BENZCar();
    }

    public function addEngine()
    {
        $this->type->setPart('ENGINE' , 'engine');
    }

    public function addDoors()
    {
        $this->type->setPart('DOOR' , 'door');
    }

    public function addBody()
    {
        $this->type->setPart('BODY' , 'body');
    }

    public function addWheels()
    {
        $this->type->setPart('WHEEL' , 'wheel');
    }

    public function getCar():Car
    {
         return $this->type;
    }
}