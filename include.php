<?php

require __DIR__ . '/Model/DataBase.php';
require __DIR__ . '/Config.php';

require __DIR__ . '/Model/Entity/AbstractEntity.php';
require __DIR__ . '/Model/Entity/Tag.php';
require __DIR__ . '/Model/Entity/Article.php';
require __DIR__ . '/Model/Entity/Comment.php';
require __DIR__ . '/Model/Entity/Role.php';
require __DIR__ . '/Model/Entity/User.php';


require __DIR__ . '/Model/Manager/ArticleManager.php';
require __DIR__ . '/Model/Manager/TagManager.php';
require __DIR__ . '/Model/Manager/RoleManager.php';
require __DIR__ . '/Model/Manager/UserManager.php';
require __DIR__ .'/Model/Manager/CommentManager.php';

require __DIR__ . '/Controller/AbstractController.php';
require __DIR__ . '/Controller/ArticleController.php';
require __DIR__ . '/Controller/ErrorController.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/UserController.php';
require __DIR__ . '/Controller/CommentController.php';

require __DIR__ . '/Routing/AbstractRouter.php';
require __DIR__ . '/Routing/ArticleRouter.php';
require __DIR__ . '/Routing/CommentRouter.php';
require __DIR__ . '/Routing/HomeRouter.php';
require __DIR__ . '/Routing/UserRouter.php';