<div>
    <?php
    use creepy\Controller\AbstractController;
    use creepy\Model\Entity\Article;
    //use creepy\Model\Entity\Comment;
    use creepy\Model\Manager\CommentManager;
    /*@var User $user */
    $article = $data['articles'];

    ?>
    <h2><?= $article->getTitle() ?></h2>

    <p><?= $article->getContent() ?></p>
    <br>
    <p>Poster par <?= $article->getUserFk()->getPseudo() ?></p>
    <div>
        <div>
            <a href="">Modifié l'article</a>
        </div>

        <div>
            <a href="">Supprimé l'article</a>
        </div>
    </div>


</div>
