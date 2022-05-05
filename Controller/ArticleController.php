<?php

namespace creepy\Controller;

use creepy\Model\Entity\Article;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\CommentManager;
use creepy\Model\Manager\UserManager;
use creepy\Model\Entity\User;

class ArticleController extends AbstractController
{
    /**
     * @return void
     */
    public function index()
    {
        $this->render('article/index');
    }

    /**
     * add an item
     * @return void
     */

    public function showArticle(int $id) {
        $this->render('article/show-article', [
            'articles' => ArticleManager::getArticleById($id)
        ]);
    }

    public function addArticle()
    {
        self::redirectIfNotConnected();
        self::verifyRole();
        if (!self::verifyRole()) {
            header('Location: /index.php?c=list-article');
        }

        if($this->verifyFormSubmit()) {
            $userSession = $_SESSION['user'];
            /* @var User $userSession */
            $user = UserManager::getUserById($userSession->getId());

            $title = $this->dataClean($this->getFormField('title'));
            $content = $this->dataClean($this->getFormField('content'));

            $article = new Article();
            $article
                ->setTitle($title)
                ->setContent($content)
                ->setUserFk($user)
            ;

            if(ArticleManager::addNewArticle($article, $title, $content, $_SESSION['user']->getId())) {
                header('Location: /index.php?c=article&a=list-article');
            }
        }
        $this->render('article/add-article');
    }

    /**
     * all articles
     * @return void
     */
    public function listArticle() {
        $this->render('article/list-article', [
            'articles' => ArticleManager::findAll(),
        ]);
    }

    /**
     * delete an item
     * @param int $id
     * @return void
     */
    public function deleteArticle(int $id) {
        if (ArticleManager::articleExists($id)) {
            $article = ArticleManager::getArticleById($id);
            $deleted = ArticleManager::deleteArticle($article);
            header('Location: /index.php?c=article&a=list-article');
        }
        $this->index();
    }

    /**
     * edit an article
     * @param int $id
     * @return void
     */
    public function editArticle(int $id)
    {
        if (isset($_POST['save'])) {
            if (ArticleManager::articleExists($id)) {
                $title = $this->dataClean($this->getFormField('title'));
                $content = $this->dataClean($this->getFormField('content'));

                ArticleManager::editArticle($id, $title, $content);
                header('Location: /index.php?c=article&a=list-article');
            }
        }
        $this->render('article/edit-article', [
            'article'=>ArticleManager::getArticleById($id)
        ]);
    }
}