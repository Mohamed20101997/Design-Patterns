<?php

namespace Behavioral\ChainOfResponsibility;

class Request
{
    private bool $done = false;
    private $id = 0;
    private string $handler;

    public function isDone(): bool
    {
        return $this->done;
    }

    public function setDone(bool $done): void
    {
        $this->done = $done;
    }

    public function getHandler(): string
    {
        return $this->handler;
    }

    public function setHandler(string $handler): void
    {
        $this->handler = $handler;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
