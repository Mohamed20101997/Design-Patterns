<?php

namespace Behavioral\ChainOfResponsibility;

class MohamedHandler extends AbstractHandler
{
    public function handle(Request $request)
    {
        if ($request->getId() < 20) {
            $request->setDone(true);
            $request->setHandler(self::class);
            return $request;
        }

        return parent::handle($request);
    }
}