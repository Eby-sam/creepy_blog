<?php
    use creepy\Controller\AbstractController;
use creepy\Controller\UserController;
use creepy\Model\Entity\Article;
use creepy\Model\Entity\User;

$articles = $data['articles'];
?>
<div id="container-article">
    <div class="divTitle">
        <h1>Creepy Pasta</h1>
    </div>
    <div id="container-global">
        <div id="article-show"><?php
            foreach ($articles as $article) {
                ?>
                <div class="article">
                    <h3 class="title"><?= $article->getTitle() ?></h3>
                    <br>
                    <div class="content">
                        <p ><?=  nl2br(html_entity_decode($article->getContent())) ?></p>
                    </div>
                    <div class="author">
                        <h4>Autheur : <span class="spanAut"><?= $article->getUserFk()->getPseudo() ?></span></h4>
                        <a href="/index.php?c=article&a=show-article&id=<?= $article->getId() ?>">Voir</a>
                    </div>
                </div><?php
            } ?>

        </div>

    </div>
</div>