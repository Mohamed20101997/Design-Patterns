<?php

namespace Behavioral\Observer;

use SplObserver;
use SplSubject;

class Waiter implements SplObserver
{
 
    private $state;
    public function update(SplSubject $subject): void
    {
        /** @var Restaurant $subject */
        $this->state = sprintf('Waiter is notifying customer about order %d', $subject->getOrderNumber());
    }

    public function getState(): string
    {
        return $this->state;
    }
} 