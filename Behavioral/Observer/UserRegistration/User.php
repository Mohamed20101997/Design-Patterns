<?php

namespace Behavioral\Observer\UserRegistration;

class User
{
    public function __construct(
        private string $name,
        private string $email,
        private string $role = '',
    ) {}

    /**
     * Create a new user and dispatch the 'user.created' event.
     * This mimics Laravel's Model::create() which fires model events.
     *
     * @param string $name
     * @param string $email
     * @param EventDispatcher $dispatcher
     * @return self
     */
    public static function create(string $name, string $email, EventDispatcher $dispatcher): self
    {
        $user = new self($name, $email);

        $dispatcher->dispatch('user.created', $user);

        return $user;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}
