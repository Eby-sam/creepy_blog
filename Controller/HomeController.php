<?php
namespace creepy\Controller;

use creepy\Model\Entity\Article;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Entity\User;
use creepy\Model\Manager\UserManager;
use creepy\Model\Manager\TagManager;

class HomeController extends AbstractController
{
    /**
     * @return void
     */
    public function index()
    {
        $this->render('home/index',[
            'articles' => ArticleManager::getSCPLimit()
        ]);
    }

    /**
     * @return void
     */
    public function mention()
    {
        $this->render('home/mentions-legales');
    }

    /**
     * @return void
     */
    public function politique()
    {
        $this->render('home/politique');
    }
}