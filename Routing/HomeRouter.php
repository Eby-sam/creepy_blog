<?php

namespace creepy\Routing;

use creepy\Routing\AbstractRouter;
use creepy\Controller\HomeController;

class HomeRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        (new HomeController())->index();
    }
}