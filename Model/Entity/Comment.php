<?php
namespace creepy\Model\Entity;

use creepy\Model\Entity\AbstractEntity;
use creepy\Model\Entity\User;


class Comment extends AbstractEntity
{
    private string $content;
    private User $author;
    private Article $article;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \creepy\Model\Entity\User
     */
    public function getAuthor(): \creepy\Model\Entity\User
    {
        return $this->author;
    }

    /**
     * @param \creepy\Model\Entity\User $author
     * @return Comment
     */
    public function setAuthor(\creepy\Model\Entity\User $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return Comment
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;
        return $this;
    }



}