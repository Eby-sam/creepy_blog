<?php

namespace creepy\Model\Manager;

use creepy\Model\Entity\Article;
use creepy\Model\Entity\Tag;
use creepy\Model\Entity\User;
use creepy\Model\Manager\TagManager;

use DataBase;

class ArticleManager
{
    public const TABLE = 'cb_article';

    /**
     * @return array
     */
    public static function findAll(): array
    {
        $articles = [];
        $query = DataBase::DataConnect()->query("SELECT * FROM  " . self::TABLE . " ORDER BY id DESC ");
        if ($query) {
            $userManager = new UserManager();


            foreach ($query->fetchAll() as $articleData) {
                $articles[] = (new Article())
                    ->setId($articleData['id'])
                    ->setTitle($articleData['title'])
                    ->setContent($articleData['content'])
                    ->setUserFk(UserManager::getUserById($articleData['user_fk']));
            }
        }
        return $articles;
    }

    /**
     * @return array
     */
    public static function getScp(): array
    {
        $articleScp = [];
        $query = DataBase::DataConnect()->query("SELECT * FROM  "
            . self::TABLE . " WHERE tag_fk = 2  ORDER  BY id DESC");
        if ($query) {
            $userManager = new UserManager();


            foreach ($query->fetchAll() as $scpData) {
                $articleScp[] = (new Article())
                    ->setId($scpData['id'])
                    ->setTitle($scpData['title'])
                    ->setContent($scpData['content'])
                    ->setUserFk(UserManager::getUserById($scpData['user_fk']));
            }
        }
        return $articleScp;
    }

    /**
     * @return array
     */
    public static function getHorror(): array
    {
        $articleScp = [];
        $query = DataBase::DataConnect()->query("SELECT * FROM  "
            . self::TABLE . " WHERE tag_fk = 1 ORDER  BY id DESC ");
        if ($query) {
            $userManager = new UserManager();


            foreach ($query->fetchAll() as $scpData) {
                $articleScp[] = (new Article())
                    ->setId($scpData['id'])
                    ->setTitle($scpData['title'])
                    ->setContent($scpData['content'])
                    ->setUserFk(UserManager::getUserById($scpData['user_fk']));
            }
        }
        return $articleScp;
    }


    /**
     * Add article in db.
     * @param Article $article
     * @return void
     */
    public static function addNewArticle(Article & $article): bool
    {
        $stmt = DataBase::DataConnect()->prepare("
            INSERT INTO " . self::TABLE . " (title, content,tag_fk, user_fk)
            VALUES (:title ,:content, :tag_fk, :user_fk)
        ");



        $stmt->bindValue(':title', $article->getTitle());
        $stmt->bindValue(':content', $article->getContent());
        $stmt->bindValue(':tag_fk', $article->getTagFk()->getId());
        $stmt->bindValue(':user_fk', $article->getUserFk()->getId());

        $result = $stmt->execute();
        $article->setId(DataBase::DataConnect()->lastInsertId());
        return $result;
    }

    /**
     * verify article exist
     * @param int $id
     * @return bool
     */
    public static function articleExists(int $id): bool
    {
        $result = DataBase::DataConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * retrieve the article by its id
     * @param int $id
     * @return Article|null
     */
    public static function getArticleById(int $id): ?Article
    {
        $result = DataBase::DataConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeArticle($result->fetch()) : null;
    }

    /**
     * retrieve the article by its id
     * @param int $id
     * @return Article|null
     */
    public static function getStoryById(int $id): ?Article
    {
        $result = DataBase::DataConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id LIMIT 1");
        return $result ? self::makeArticle($result->fetch()) : null;
    }

    /**
     * @param array $data
     * @return Article
     */
    private static function makeArticle(array $data): Article
    {
        return (new Article())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setContent($data['content'])
            ->setUserFk(UserManager::getUserById($data['user_fk']));
    }

    /**
     * Update an article from article table.
     * @param int $id
     * @param string $title
     * @param string $content
     * @return bool
     */
    public function updateArticle(int $id, string $title, string $content): bool {
        $request = DataBase::DataConnect()->prepare("
            UPDATE article SET 
                title = :title,
                content = :content
            WHERE id=:id
        ");

        $request->bindValue(':title', ($title));
        $request->bindValue(':content', ($content));
        $request->bindValue(':id', $id);
        return $request->execute();
    }

    /**
     * @param Article|null $article
     * @return false|int
     */
    public static function deleteArticle(?Article $article)
    {
        if (self::articleExists($article->getId())) {
            return DataBase::DataConnect()->exec("
            DELETE FROM " . self::TABLE . " WHERE id = {$article->getId()}
        ");
        }
        return false;
    }

    /**
     * modify article
     * @param int $id
     * @param string $title
     * @param string $content
     * @return void
     */
    public static function editArticle(int $id, string $title, string $content)
    {
        $stmt = DataBase::DataConnect()->prepare("
            UPDATE " . self::TABLE . " SET title= :title, content = :content WHERE id = :id
                ");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        $stmt->execute();
    }
}