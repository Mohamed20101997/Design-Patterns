<?php

namespace Structural\ChainOfResponsibility;

class AhmedHandler extends AbstractHandler
{
    public function handle(Request $request)
    {
        if ($request->getId() < 60) {

            $request->setDone(true);
            $request->setHandler(self::class);
            return $request;
        }

        return parent::handle($request);
    }
}