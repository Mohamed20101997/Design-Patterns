<?php

namespace Behavioral\Observer\UserRegistration;

interface EventInterface
{
    /**
     * Register a listener for a given event.
     *
     * @param string $event
     * @param callable $listener
     * @return void
     */
    public function listen(string $event, callable $listener): void;

    /**
     * Dispatch an event and call all registered listeners.
     *
     * @param string $event
     * @param mixed $data
     * @return void
     */
    public function dispatch(string $event, mixed $data): void;
}
