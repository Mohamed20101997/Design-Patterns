<?php

namespace Tests;


use PHPUnit\Framework\TestCase;
use Behavioral\ChainOfResponsibility\AhmedHandler;
use Behavioral\ChainOfResponsibility\AliHandler;
use Behavioral\ChainOfResponsibility\MohamedHandler;
use Behavioral\ChainOfResponsibility\Request;

class ChainOfResponsibilityTest extends TestCase
{

    public function test_ali_can_handle_request()
    {
        $ali = new AliHandler();
        $mohamed = new MohamedHandler();
        $ahmed = new AhmedHandler();

        $ali->setNext($mohamed)->setNext($ahmed);

        $request  = new Request();
        $request->setId(4);
        $ali->handle($request);

        $this->assertTrue($request->isDone());
        $this->assertEquals($ali::class, $request->getHandler());
    }

    public function test_mohamed_can_handle_request()
    {
        $ali = new AliHandler();
        $mohamed = new MohamedHandler();
        $ahmed = new AhmedHandler();

        $ali->setNext($mohamed)->setNext($ahmed);

        $request  = new Request();
        $request->setId(2);
        $mohamed->handle($request);

        $this->assertTrue($request->isDone());
        $this->assertEquals($mohamed::class, $request->getHandler());
    }

    public function test_ahmed_can_handle_request()
    {
        $ali = new AliHandler();
        $mohamed = new MohamedHandler();
        $ahmed = new AhmedHandler();

        $ali->setNext($mohamed)->setNext($ahmed);

        $request  = new Request();
        $request->setId(50);
        $ahmed->handle($request);

        $this->assertTrue($request->isDone());
        $this->assertEquals($ahmed::class, $request->getHandler());
    }

    public function test_no_handler_can_handle_request()
    {
        $ali = new AliHandler();
        $mohamed = new MohamedHandler();
        $ahmed = new AhmedHandler();

        $ali->setNext($mohamed)->setNext($ahmed);

        $request  = new Request();
        $request->setId(71);
        $response = $ali->handle($request);

        $this->assertFalse($response->isDone());
    }
}   