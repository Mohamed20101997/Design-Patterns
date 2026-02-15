<?php

namespace Behavioral\Observer\UserRegistration;

class EventDispatcher implements EventInterface
{
    /**
     * Map of event names to arrays of listener callables.
     *
     * @var array<string, callable[]>
     */
    private array $listeners = [];

    /**
     * Register a listener for a given event.
     *
     * @param string $event
     * @param callable $listener
     * @return void
     */
    public function listen(string $event, callable $listener): void
    {
        $this->listeners[$event][] = $listener;
    }

    /**
     * Dispatch an event and call all registered listeners.
     *
     * @param string $event
     * @param mixed $data
     * @return void
     */
    public function dispatch(string $event, mixed $data): void
    {
        if (!isset($this->listeners[$event])) {
            return;
        }

        foreach ($this->listeners[$event] as $listener) {
            $listener($data);
        }
    }
}
