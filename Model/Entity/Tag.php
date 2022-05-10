<?php

namespace creepy\Model\Entity;
use creepy\Model\Entity\AbstractEntity;

class Tag extends AbstractEntity
{

    private string $tag_name;

    /**
     * @return string
     */
    public function getTagName(): string
    {
        return $this->tag_name;
    }

    /**
     * @param string $tag_name
     * @return Tag
     */
    public function setTagName(string $tag_name): self
    {
        $this->tag_name = $tag_name;
        return $this;
    }




}