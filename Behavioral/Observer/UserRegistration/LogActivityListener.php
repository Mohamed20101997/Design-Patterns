<?php

namespace Behavioral\Observer\UserRegistration;

class LogActivityListener
{
    private string $log = '';

    /**
     * Handle the user.created event.
     *
     * @param User $user
     * @return void
     */
    public function handle(User $user): void
    {
        $this->log = sprintf(
            'New user registered: %s (%s)',
            $user->getName(),
            $user->getEmail()
        );
    }

    public function getLog(): string
    {
        return $this->log;
    }
}
