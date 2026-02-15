<?php

namespace Tests;

use Behavioral\Observer\UserRegistration\AssignDefaultRoleListener;
use Behavioral\Observer\UserRegistration\EventDispatcher;
use Behavioral\Observer\UserRegistration\LogActivityListener;
use Behavioral\Observer\UserRegistration\SendWelcomeEmailListener;
use Behavioral\Observer\UserRegistration\User;
use PHPUnit\Framework\TestCase;

class UserRegistrationObserverTest extends TestCase
{
    private EventDispatcher $dispatcher;
    private SendWelcomeEmailListener $emailListener;
    private LogActivityListener $logListener;
    private AssignDefaultRoleListener $roleListener;

    protected function setUp(): void
    {
        $this->dispatcher = new EventDispatcher();
        $this->emailListener = new SendWelcomeEmailListener();
        $this->logListener = new LogActivityListener();
        $this->roleListener = new AssignDefaultRoleListener();

        // Register listeners — just like Event::listen() in Laravel
        $this->dispatcher->listen('user.created', [$this->emailListener, 'handle']);
        $this->dispatcher->listen('user.created', [$this->logListener, 'handle']);
        $this->dispatcher->listen('user.created', [$this->roleListener, 'handle']);
    }

    public function test_all_listeners_are_triggered_when_user_is_created()
    {
        $user = User::create('Mohamed', 'mohamed@example.com', $this->dispatcher);

        $this->assertEquals('Sending welcome email to Mohamed at mohamed@example.com', $this->emailListener->getLog());
        $this->assertEquals('New user registered: Mohamed (mohamed@example.com)', $this->logListener->getLog());
        $this->assertEquals('Assigned default role "member" to Mohamed', $this->roleListener->getLog());
        $this->assertEquals('member', $user->getRole());
    }

    public function test_each_listener_works_independently()
    {
        // Only register the email listener
        $dispatcher = new EventDispatcher();
        $emailListener = new SendWelcomeEmailListener();
        $dispatcher->listen('user.created', [$emailListener, 'handle']);

        $user = User::create('Ali', 'ali@example.com', $dispatcher);

        $this->assertEquals('Sending welcome email to Ali at ali@example.com', $emailListener->getLog());
        $this->assertEquals('', $user->getRole()); // No role listener registered
    }

    public function test_multiple_users_produce_separate_results()
    {
        $user1 = User::create('Mohamed', 'mohamed@example.com', $this->dispatcher);
        $user2 = User::create('Ali', 'ali@example.com', $this->dispatcher);

        // Listeners hold the latest state (like Laravel's last fired event)
        $this->assertEquals('Sending welcome email to Ali at ali@example.com', $this->emailListener->getLog());
        $this->assertEquals('New user registered: Ali (ali@example.com)', $this->logListener->getLog());
        $this->assertEquals('Assigned default role "member" to Ali', $this->roleListener->getLog());

        // But each user object retains its own state
        $this->assertEquals('member', $user1->getRole());
        $this->assertEquals('member', $user2->getRole());
    }
}
