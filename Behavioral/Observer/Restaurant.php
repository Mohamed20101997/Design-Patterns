<?php

namespace Behavioral\Observer;

use SplObjectStorage;
use SplSubject;
use SplObserver;

class Restaurant implements SplSubject
{
 
    private $orderNumber = 0;

    public function __construct(
        private $observers = new SplObjectStorage()
    ){}

    /**
     * @var SplObserver $observer 
     * @return void
     */
    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * @var SplObserver $observer 
     * @return void
     */
    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * @return void
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return void
     */
    public function addOrderNumber(): void
    { 
        $this->orderNumber++;
        $this->notify();
    }

    /**
     * @return int
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }
}