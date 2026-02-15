<?php

namespace Tests;

use Behavioral\Observer\Cacher;
use Behavioral\Observer\Kitchen;
use Behavioral\Observer\Restaurant;
use Behavioral\Observer\Waiter;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    private $restaurant;
    private $waiter;
    private $kitchen;
    private $cacher;

    protected function setUp(): void
    {
        $this->restaurant = new Restaurant();
        $this->waiter = new Waiter();
        $this->kitchen = new Kitchen();
        $this->cacher = new Cacher();

        $this->restaurant->attach($this->waiter);
        $this->restaurant->attach($this->kitchen);
        $this->restaurant->attach($this->cacher);
    }
    
   public function test_can_notify_all_observers_when_new_order_is_comming()
   {
        $this->restaurant->addOrderNumber();
        
        $this->assertEquals('Waiter is notifying customer about order 1', $this->waiter->getState());
        $this->assertEquals('Kitchen is preparing order 1', $this->kitchen->getState());
        $this->assertEquals('Cacher is caching order 1', $this->cacher->getState());
   }
   

    public function test_can_notify_all_observers_when_two_new_orders_are_comming()
   {
        $this->restaurant->addOrderNumber();
        $this->restaurant->addOrderNumber();
        
        $this->assertEquals('Waiter is notifying customer about order 2', $this->waiter->getState());
        $this->assertEquals('Kitchen is preparing order 2', $this->kitchen->getState());
        $this->assertEquals('Cacher is caching order 2', $this->cacher->getState());
   }
}