<?php
namespace creepy\Controller;

use creepy\Model\Manager\ArticleManager;


class HomeController extends AbstractController
{
    /**
     * @return void
     */
    public function index()
    {
        $this->render('home/index');
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