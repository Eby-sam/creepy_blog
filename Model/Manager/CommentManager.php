<?php

namespace creepy\Model\Manager;

use creepy\Controller\AbstractController;
use creepy\Model\Entity\Article;
use creepy\Model\Entity\Comment;
use DataBase;
use creepy\Model\Entity\User;

class CommentManager
{
    public const TABLE = 'cb_comment';

    /**
     * @return array
     */
    public static function findAll(): array
    {
        $comments = [];
        $query = DataBase::DataConnect()->query("SELECT * FROM " . self::TABLE . " ORDER BY id DESC");

        if ($query) {
            if (isset($_SESSION['user'])) {
                foreach ($query->fetchAll() as $comment) {
                    $comments[] = (new Comment())
                        ->setId($comment['id'])
                        ->setContent($comment['content'])
                        ->setAuthor(UserManager::getUserById($comment['user_fk']))
                        ->setArticle(ArticleManager::getArticleById($comment['article_fk']));
                }
            }
        }
        return $comments;
    }

    /**
     * verify comment exist
     * @param int $id
     * @return int|mixed
     */
    public static function commentExists(int $id)
    {
        $result = DataBase::DataConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE);
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param string $content
     * @param int $user_fk
     * @param int $article_fk
     * @return void
     */
    public static function addComment(string $content,int  $user_fk,int $article_fk)
    {
        $stmt = DataBase::DataConnect()->prepare("
            INSERT INTO ". self::TABLE. " (content, user_fk, article_fk)
                VALUES ( :content, :user_fk, :article_fk)
        ");
        if (isset($_SESSION['user'])) {
            $user = $_SESSION ['user'];

            /* @var User $user */
            $user_fk = $user->getId();
        }

        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':user_fk', $user_fk);
        $stmt->bindParam(':article_fk', $article_fk);

        $stmt->execute();
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function deleteComment (int $id): bool
    {
        $query =  DataBase::DataConnect()->exec("
            DELETE FROM " . self::TABLE . " WHERE id = $id
        ");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @param array $data
     * @return Comment
     */
    private static function makeComment(array $data): Comment
    {
        return (new Comment())
            ->setId($data['id'])
            ->setContent($data['content'])
            ->setAuthor(UserManager::getUserById($data['user_fk']));
    }

    /**
     * retrieve the article by its id
     * @param int $id
     * @return Comment
     */
    public static function getCommentById(int $id): ?Comment
    {
        $result = DataBase::DataConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeComment($result->fetch()) : null;
    }

    /**
     * retrieve a comment by its id
     * @param Article $article
     * @return array
     */
    public static function getCommentByArticle(Article $article):array
    {
        $comments = [];
        $query = DataBase::DataConnect()->query("
            SELECT *FROM " . self::TABLE . " WHERE article_fk = " . $article->getId() ." ORDER BY id DESC
        ");

        if ($query) {
            foreach ($query->fetchAll() as $commentData) {
                $comments[] = (new Comment())
                    ->setId($commentData['id'])
                    ->setContent($commentData['content'])
                    ->setAuthor(UserManager::getUserById($commentData['user_fk']))
                    ->setArticle(ArticleManager::getArticleById($commentData['article_fk']));
            }
        }
        return $comments;
    }
}