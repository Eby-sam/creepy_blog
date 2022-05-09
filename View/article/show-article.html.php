<?php

use creepy\Controller\AbstractController;
use creepy\Model\Entity\Article;
use creepy\Model\Entity\Comment;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\CommentManager;

/*@var Article $article */
$article = $data['articles'];
?>
<div id="articleView">
    <div id="titleA">
        <h1><?= $article->getTitle() ?></h1>
    </div>
    <div id="contentA">
        <p><?=  nl2br(html_entity_decode($article->getContent())) ?></p>
    </div>
    <div id="nameA">
        <h2>Posté par : <span><?= $article->getUserFk()->getPseudo() ?></span></h2>
        <?php
        if (AbstractController::verifyRole()) { ?>
            <a href=/index.php?c=article&a=delete-article&id=<?= $article->getId() ?>"">supprimer l'article</a><?php
        }
        ?>
    </div>
    <div id="addCom">
        <h3>Ajouter un commentaire</h3>
        <div id="form-addComment">
            <form action="/index.php?c=comment&a=add-comment&id=<?= $article->getId() ?>" method="post" id="addComment">
                <div>
                    <label for="content"></label>
                    <textarea name="content" id="content" cols="50" rows="10" required></textarea>
                </div>

                <input type="submit" name="save" value="Enregistrer">
            </form>
        </div>
    </div>
    <div id="commentArticle">
        <span id="comments">Commentaires :</span>
        <div id="commentUser"><?php
            foreach (CommentManager::getCommentByArticle($article) as $item) {
            ?>
            <div id="commentary"><p><?= $item->getContent() ?></p></div>
            <div id="place">
                <p class="commentPseudo"><?= $item->getAuthor()->getPseudo() ?> </p><?php
                if (AbstractController::verifyUserConnect()) { ?>
                <a href="/index.php?c=comment&a=deleteComment&id=<?= $item->getId() ?>">Supprimer</a><?php
                }
                }
                ?>
            </div>
        </div>


    </div>


</div>
