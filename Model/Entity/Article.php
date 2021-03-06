<?php

namespace creepy\Model\Entity;

use creepy\Model\Entity\AbstractEntity;

class Article extends AbstractEntity {

    private string $title;
    private string $content;
    private Tag $tag_fk;
    private User $user_fk;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return Tag
     */
    public function getTagFk(): Tag
    {
        return $this->tag_fk;
    }

    /**
     * @param Tag $tag_fk
     * @return Article
     */
    public function setTagFk(Tag $tag_fk): self
    {
        $this->tag_fk = $tag_fk;
        return $this;
    }



    /**
     * @return User
     */
    public function getUserFk(): User
    {
        return $this->user_fk;
    }

    /**
     * @param User $user_fk
     * @return Article
     */
    public function setUserFk(User $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }

}
