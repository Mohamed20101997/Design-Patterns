<?php

namespace Behavioral\Observer\UserRegistration;

class AssignDefaultRoleListener
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
        $user->setRole('member');

        $this->log = sprintf(
            'Assigned default role "member" to %s',
            $user->getName()
        );
    }

    public function getLog(): string
    {
        return $this->log;
    }
}
