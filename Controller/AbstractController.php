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
     */
    public function render(string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . '/../View/' . $template . '.html.php';
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

    /**
     * checks if the user is logged in
     * @return bool
     */
//    public static function ifUserIsAuthor(): bool
//    {
//        return isset($_SESSION['user']) && null === ($_SESSION['user'])->getId();
//    }

    public static function isAuthor(int $commentId): bool
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



    /**
     * @return void
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
        $data = trim(strip_tags($data));
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}