<?php

namespace Behavioral\Observer;

use SplObserver;
use SplSubject;

class Cacher implements SplObserver
{
 
    private $state;
    public function update(SplSubject $subject): void
    {
        /** @var Restaurant $subject */
        $this->state = sprintf('Cacher is caching order %d', $subject->getOrderNumber());
    }

    public function getState(): string
    {
        return $this->state;
    }
}