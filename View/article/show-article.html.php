<?php
use creepy\Controller\AbstractController;
use creepy\Model\Entity\Article;
//use creepy\Model\Entity\Comment;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\CommentManager;
/*@var Article $article */
$article = $data['articles'];
?>
<div>
    <p><?= $article->getTitle()?></p>
    <p><?= $article->getContent()?></p>
    <p><?= $article->getUserFk()->getPseudo()?></p>
    <p><a href=""></a></p>
    <p><a href=""></a></p>
</div>
