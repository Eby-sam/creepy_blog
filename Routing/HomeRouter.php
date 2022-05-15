<?php

namespace creepy\Routing;

use creepy\Controller\ErrorController;
use creepy\Routing\AbstractRouter;
use creepy\Controller\HomeController;

class HomeRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $errorController = new ErrorController();
        $controller = new HomeController();

        if(null === $action) {
            $errorController->error404($action);
        }


        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'mentions-legales':
                $controller->mention();
                break;
            case 'politique':
                $controller->politique();
                break;
            default:
                $errorController->error404($action);
        }
    }
}