<?php
    use creepy\Controller\AbstractController;
    use creepy\Controller\UserController;
    use creepy\Model\Entity\Tag;
    use creepy\Model\Entity\User;
    use creepy\Model\Entity\Article;
    use creepy\Model\Entity\Comment;
    use creepy\Model\Manager\ArticleManager;
    use creepy\Model\Manager\TagManager;
    use creepy\Model\Manager\CommentManager;
    use creepy\Model\Manager\UserManager;

    $articles = $data['articles'];
?>

<div id="container-home">
    <div class="divTitle">
        <?php
        if (!UserController::verifyUserConnect()) { ?>
        <h1>Bonjour et bienvenu sur le</h1>
            <h1>Creepy blog</h1>
            <div id="msg">
                <h2> N'hésitez pas a vous inscrire ou vous connectez pour une meilleur expérience</h2>
            </div>

            <?php
            }
            else { ?>
                <h1>Bienvenue <?= UserManager::getUserById($_SESSION['user']->getId())->getPseudo() ?></h1>
        <?php
        } ?>
    </div>
        <?php
        if (!UserController::verifyUserConnect()) { ?>

            <?php
        }
        else { ?>
        <div id="img"></div>
            <?php
        } ?>
    <div class="divGet">
        <div class="divStory">
            <?php
            foreach ($articles as $article) {
                ?>
                <div class="article">
                <h3 class="title"><?= $article->getTitle() ?></h3>
                <br>
                <div class="content">
                    <p><?=  nl2br(html_entity_decode($article->getContent())) ?></p>
                </div>
                <div class="author">
                    <h4>Autheur : <span class="spanAut"><?= $article->getUserFk()->getPseudo() ?></span></h4>
                    <a href="/index.php?c=article&a=show-article&id=<?= $article->getId() ?>">Voir</a>
                </div>
                </div><?php
            }?>
        </div>

    </div>
</div>
