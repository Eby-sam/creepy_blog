<?php
namespace creepy\Controller;

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