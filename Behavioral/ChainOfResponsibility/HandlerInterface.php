<?php

namespace Behavioral\ChainOfResponsibility;

interface HandlerInterface
{
    public function setNext(HandlerInterface $handler): HandlerInterface;

    public function handle(Request $request);
}
 