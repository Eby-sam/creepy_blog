<?php
use creepy\Routing\AbstractRouter;
use creepy\Routing\ArticleRouter;
use creepy\Routing\HomeRouter;
use creepy\Routing\UserRouter;
use creepy\Routing\CommentRouter;
use creepy\Controller\ErrorController;

require __DIR__ . '/../include.php';
session_start();

$page = isset($_GET['c']) ? AbstractRouter::secure($_GET['c']) : 'home';
$method = isset($_GET['a']) ? AbstractRouter::secure($_GET['a']) : 'index';

switch ($page) {
    case 'home':
        HomeRouter::route();
        break;
    case 'user':
        UserRouter::route($method);
        break;
    case 'article':
        ArticleRouter::route($method);
        break;
    case 'comment':
        CommentRouter::route($method);
        break;
    default:
        (new ErrorController())->error404($page);
}