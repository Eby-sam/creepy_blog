<?php
use creepy\Controller\AbstractController;
use creepy\Controller\UserController;
use creepy\Model\Entity\User;
use creepy\Model\Entity\Role;
use creepy\Model\Manager\UserManager;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/ckeditor/ckeditor.js"></script>
    <title>Creepy blog</title>
</head>
<body>
<div id="container">
    <div id="bande">
        <div id="title">CREEPY BLOG</div>
        <div id="center">

        </div>
        <div id="log">
            <?php
            if (!UserController::verifyUserConnect()) {?>
                <div id="inscri">
                    <a href="/index.php?c=user&a=register">Inscription</a>
                </div>
                <div id="connect">
                    <a href="/index.php?c=user&a=connect">Connexion</a>
                </div>
            <?php
            }
            else {?>
                <div id="deco">
                    <a href="/index.php?c=user&a=disconnected">Deconnexion</a>
                </div>
            <?php } ?>



        </div>
    </div>
    <?php

    // error messages.
    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);

        foreach ($errors as $error) { ?>
            <div class="alert alert-error"><?= $error ?></div> <?php
        }
    }

    //success messages.
    if (isset($_SESSION['success'])) {
        $message = $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
        <div class="alert alert-success"><?= $message ?></div> <?php
    }
    ?>
    <div id="container-body">
          <nav id="nav">
             <div id="divNav">
                 <div class="link">

                     <a href="/index.php?c=home"><i class="fa fa-home" aria-hidden="true"></i></a>
                 </div>
                 <?php
                 if (!UserController::verifyUserConnect()) {?>

                     <?php
                 }
                 else {?>
                     <div class="link second">

                         <i class="fa fa-user-circle" aria-hidden="true"></i>
                         <a href="/index.php?c=user"><?= UserManager::getUserById($_SESSION['user']->getId())->getPseudo() ?></a>
                     </div>
                 <?php } ?>
                    <div class="link second">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <a href="/index.php?c=article&a=list-article">Story</a>
                    </div>
                     <div class="link second">
                         <i class="fa fa-book" aria-hidden="true"></i>
                         <a href="/index.php?c=article&a=list-horror-article">Horror</a>
                     </div>
                     <div class="link second">
                         <i class="fa fa-book" aria-hidden="true"></i>
                         <a href="/index.php?c=article&a=list-scp-article">SCP</a>
                     </div>
                </div>
            </nav>
            <main class="container">
                    <?= $html ?>
            </main>
        </div>
    </div>

    <footer>
        <div id="divF">
            <div class="mentions" id="mention">
                <a href="/index.php?c=home&a=mentions-legales">Mentions légales</a>
            </div>
            <div class="mentions" id="politique">
                <a href="/index.php?c=home&a=politique">Politique de confidentialité</a>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/52cbc63ebe.js" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>

</body>
</html>

