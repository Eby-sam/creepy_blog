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
}