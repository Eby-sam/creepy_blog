<?php
namespace creepy\Controller;

use creepy\Model\Entity\Role;
use creepy\Model\Entity\User;
use creepy\Model\Entity\Comment;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\CommentManager;
use creepy\Model\Manager\RoleManager;

abstract class AbstractController
{
    /**
     * @return mixed
     */
    abstract public function index();

    /**
     * @param string $template
     * @param array $data
     * @return void
     * render function for hmtl page
     */
    public function render(string $template, array $data = [])
    {
        // speeds up the loading of the page and allows the placement of a header
        ob_start();
        require __DIR__ . '/../View/' . $template . '.html.php';
        // reads the current contents of the output buffer then clears it
        $html = ob_get_clean();
        require __DIR__ . '/../View/base.html.php';
        exit;
    }

    /**
     * check if the form is submitted
     * @return bool
     */
    public function verifyFormSubmit(): bool
    {
        return isset($_POST['save']);
    }

    /**
     * checks if the user is logged in
     * @return bool
     */
    public static function verifyUserConnect(): bool
    {
        return isset($_SESSION['user']) && null !== ($_SESSION['user'])->getId();
    }

    /*
   * @return bool
   * function allowing the AUTHOR
   * to perform certain actions
   */
    public static function isAuthor(int $commentId ): bool
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $comment = CommentManager::getCommentById($commentId);
            if($user->getRoleFk()->getRoleName() === 'ADMIN' || $user->getId() === $comment->getAuthor()->getId()) {
                return true;
            }
        }
        return false;
    }

    /*
     * @return bool
     * function allowing the author of the article and the admin
     * to perform certain actions
     */
    public static function isAuthorArticle(int $articleId): bool
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $article = ArticleManager::getArticleById($articleId);
            if($user->getRoleFk()->getRoleName() === 'ADMIN' || $user->getId() === $article->getUserFk()->getId()) {
                return true;
            }
        }
        return false;
    }


    /**
     * @return void
     * redirect logged in user
     */
    public function redirectIfConnected(): void
    {
        if(self::verifyUserConnect()) {
            $this->render('home/index');
        }
    }


    /**
     * @param string $field
     * @param $default
     * @return mixed|string
     */
    public function getFormField(string $field, $default = null)
    {
        if (!isset($_POST[$field])) {
            return (null === $default) ? '' : $default;
        }

        return $_POST[$field];
    }

    /**
     * @return void
     * redirects the not logged in user.
     */
    public  function redirectIfNotConnected(): void
    {
        if(!self::verifyUserConnect()) {
            $this->render('home/index');
            echo "Vous devez vous connecté";
        }
    }

    /**
     * check role
     * @return bool
     * security function allowing only the ADMIN and AUTHOR to access ...
     */
    public static function ifAuthorOrAdmin(): bool
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if($user->getRoleFk()->getRoleName() === 'ADMIN' || $user->getRoleFk()->getRoleName() === 'AUTHOR') {
                return true;
                }
            }
        return false;
    }



    /**
     * check role
     * @return bool
     * security function allowing only the ADMIN to access ...
     */
    public static function ifAdmin(): bool
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if($user->getRoleFk()->getRoleName() === 'ADMIN') {
                return true;
            }
        }
        return false;
    }

    /**
     * sanitize data
     * @param $data
     * @return string
     */
    public function dataClean($data): string
    {
        // remove html tags
        $data = trim(strip_tags($data));
        // Remove backslashes from a string
        $data = stripslashes($data);
        // prevent users from inserting malicious HTML code
        return htmlspecialchars($data);
    }
}