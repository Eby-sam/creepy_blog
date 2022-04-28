<?php

namespace creepy\Model\Entity;

use creepy\Model\Entity\AbstractEntity;

class Article extends AbstractEntity {

    private string $title;
    private string $content;
    private string $user_fk;
    private string $comment_fk;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
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
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserFk(): string
    {
        return $this->user_fk;
    }

    /**
     * @param string $user_fk
     */
    public function setUserFk(string $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentFk(): string
    {
        return $this->comment_fk;
    }

    /**
     * @param string $comment_fk
     */
    public function setCommentFk(string $comment_fk): self
    {
        $this->comment_fk = $comment_fk;
        return $this;
    }

}
