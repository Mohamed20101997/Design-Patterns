<?php

namespace Behavioral\Observer;

use SplObserver;
use SplSubject;

class Kitchen implements SplObserver
{
 
    private $state;
    public function update(SplSubject $subject): void
    {
        /** @var Restaurant $subject */
        $this->state = sprintf('Kitchen is preparing order %d', $subject->getOrderNumber());
    }

    public function getState(): string
    {
        return $this->state;
    }
}