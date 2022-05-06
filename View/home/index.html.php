<?php

use creepy\Controller\UserController;
use creepy\Model\Manager\UserManager;

?>

<div id="container-home">
    <div class="divTitle">
        <?php
        if (!UserController::verifyUserConnect()) { ?>
        <h1>Bonjour bienvenu sur le</h1>
            <h1>Creepy blog</h1>

            <h2> n'hésitez pas a vous inscrire ou vous connectez pour une meilleur expérience</h2>

            <?php
            }
            else { ?>
        <h1>Bienvenue <?= UserManager::getUserById($_SESSION['user']->getId())->getPseudo() ?></h1>
        <?php
        } ?>


    </div>
</div>
