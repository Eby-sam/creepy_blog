<?php

namespace creepy\Routing;

use creepy\Controller\ErrorController;
use creepy\Controller\UserController;

class UserRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $controller = new UserController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'validation':
                self::routeParameters($controller,'validation', ['token'=> 'string']);
                break;
            case 'show-user':
                self::routeParameters($controller, 'showUser', ['id' => 'int']);
                break;
            case 'edit-user':
                self::routeParameters($controller, 'editUser', ['id' => 'int']);
                break;
            case 'delete-user':
                self::routeParameters($controller, 'deleteUser', ['id' => 'int']);
                break;
            case 'delete-users':
                self::routeParameters($controller, 'deleteUserConnected', ['id' => 'int']);
                break;
            case 'register':
                $controller->register();
                break;
            case 'disconnected':
                $controller->disconnected();
                break;
            case 'connect':
                $controller->connect();
                break;
            default:
                (new ErrorController())->error404($action);
        }
    }
}