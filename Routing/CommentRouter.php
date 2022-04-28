<?php

namespace creepy\Routing;

use App\Routing\AbstractRouter;
use creepy\Controller\AbstractController;
use creepy\Controller\CommentController;
use creepy\Controller\ErrorController;
use creepy\Model\Manager\CommentManager;

class CommentRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $errorController = new ErrorController();
        $controller = new CommentController();

        if(null === $action) {
            $errorController->error404($action);
        }

        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'add-comment':
                self::routeParameters($controller, 'addComment', ['id' => 'int']);
                break;
            case 'list-comment':
                $controller->listComment();
                break;
            case 'delete-comment':
                self::routeParameters($controller, 'deleteComment', ['id' => 'int']);
                break;
            default:
                $errorController->error404($action);
        }
    }
}