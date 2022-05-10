<?php
namespace creepy\Model\Manager;

use creepy\Model\Entity\Article;
use DataBase;
use creepy\Model\Entity\Tag;

class TagManager {
    public const TABLE = 'cb_tag';


    /**
     * function get tag by Id .
     */
    public static function getById(int $id): Tag
    {
        $tag = new Tag();
        $request = DataBase::DataConnect()->prepare("
            SELECT * FROM ". self::TABLE ." WHERE id = :id
        ");
        $request->bindValue(':id', $id);
        $request->execute();
        if ($tagData = $request->fetch()) {
            $tag->setId($tagData['id']);
            $tag->setTagName($tagData['tag_name']);
        }
        return $tag;
    }
}
