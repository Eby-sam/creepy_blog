<?php

    use creepy\Controller\UserController;
    use creepy\Model\Manager\UserManager;


    use creepy\Controller\AbstractController;
    use creepy\Model\Entity\Tag;
    use creepy\Model\Entity\Article;
    use creepy\Model\Entity\Comment;
    use creepy\Model\Manager\ArticleManager;
    use creepy\Model\Manager\TagManager;
    use creepy\Model\Manager\CommentManager;

    $articles = $data['articles'];
?>

<div id="container-home">
    <div class="divTitle">
        <?php
        if (!UserController::verifyUserConnect()) { ?>
        <h1>Bonjour et bienvenu sur le</h1>
            <h1>Creepy blog</h1>

            <h2> n'hésitez pas a vous inscrire ou vous connectez pour une meilleur expérience</h2>

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
    <div id="divGet">

        <div id="divHORROR">

        </div>
    </div>
</div>
