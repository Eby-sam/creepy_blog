<?php

namespace creepy\Routing;

use creepy\Routing\AbstractRouter;
use creepy\Controller\ArticleController;
use creepy\Controller\CommentController;
use creepy\Controller\ErrorController;
use creepy\Model\Manager\CommentManager;

class ArticleRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $errorController = new ErrorController();
        $controller = new ArticleController();

        if(null === $action) {
            $errorController->error404($action);
        }

        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'add-article':
                $controller->addArticle();
                break;
            case 'list-article':
                $controller->listArticle();
                break;
            case 'list-scp-article':
                $controller->listSCP();
                break;
            case 'list-horror-article':
                $controller->listHorror();
                break;
            case 'show-article':
                self::routeParameters($controller, 'showArticle', ['id' => 'int']);
                break;
            case 'edit-article':
                self::routeParameters($controller, 'editArticle', ['id' => 'int']);
                break;
            case 'delete-article':
                self::routeParameters($controller, 'deleteArticle', ['id' => 'int']);
                break;
            default:
                $errorController->error404($action);
        }
    }
}