<?php

namespace Behavioral\Observer\UserRegistration;

class SendWelcomeEmailListener
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
            'Sending welcome email to %s at %s',
            $user->getName(),
            $user->getEmail()
        );
    }

    public function getLog(): string
    {
        return $this->log;
    }
}
