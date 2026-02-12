<?php

namespace Tests;


use PHPUnit\Framework\TestCase;
use Structural\ChainOfResponsibility\AhmedHandler;
use Structural\ChainOfResponsibility\AliHandler;
use Structural\ChainOfResponsibility\MohamedHandler;
use Structural\ChainOfResponsibility\Request;

class ChainOfResponsibilityTest extends TestCase
{

    public function testAliCanHandleRequest()
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

    public function testMohamedCanHandleRequest()
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

    public function testAhmedCanHandleRequest()
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

    public function testNoHandlerCanHandleRequest()
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