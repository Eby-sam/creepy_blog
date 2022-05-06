<?php
    use creepy\Controller\AbstractController;
use creepy\Controller\UserController;
use creepy\Model\Entity\User;
    use creepy\Model\Entity\Role;
    use creepy\Model\Manager\UserManager;

?>
<div id="container-user">
    <div class="divTitle">
        <h1>PROFIL</h1>
    </div>
    <div class="profil">
        <div id="info-user">
            <div id="pseudo">
                <h2 class="userPseudo"><?=UserManager::getUserById($_SESSION['user']->getId())->getPseudo() ?></h2>
            </div>
            <div id="infoUtil">
                <div id="identity">
                    <div>Nom : <span><?=UserManager::getUserById($_SESSION['user']->getId())->getLastname() ?></span> </div>
                    <div>Prenom : <span><?=UserManager::getUserById($_SESSION['user']->getId())->getFirstname() ?></span></div>
                </div>
               <div id="divMail">
                   <p>Email : <span><?=UserManager::getUserById($_SESSION['user']->getId())->getEmail() ?></span></p>
               </div>

            </div>
            <div class="articleForm">
                <?php
                if (UserController::verifyRole()) {?>
                    <h3 >Ajoutez un article</h3>
                    <form action="/index.php?c=user" method="post" id="">
                        <div>
                            <input type="text" placeholder="Titre de l'article">
                        </div>
                        <div>
                            <textarea name="" id="" cols="30" rows="10" placeholder="Texte de l'article"></textarea>
                        </div>
                        <div>
                            <input type="submit" value="créer" name="save" class="save">
                        </div>
                    </form>
                    <?php
                } else { ?>
                <?php }
                ?>


            </div>
        </div>
        <div id="user-article">
            <div>
                <h2 >Règlement</h2>
                <div id="regles">
                    <p>
                        Bonjour à tous et à toutes, par ce présent règlement nous vous informons que quelques règles sont
                        en vigueur sur ce site.
                    </p>
                    <p>
                        premierement assurez-vous de ne donnée a personnes vos information personnel tel que :
                    </p>
                    <p>
                        mot de passe
                    </p>
                </div>



                <br><br><br><br><br>



            </div>
            <div id="userList">
                <?php
                if (UserController::verifyRole()) {?>
                    <h3>User List</h3>
                    <?php
                    foreach ($data['users_list'] as $user) {
                        /* @var User $user */ ?>
                        <div>
                            <div>
                                <a href="/index.php?c=user&a=show-user&id<?= $user->getId() ?>"><?= $user->getPseudo() ?></a>
                                <a href="/index.php?c=user&a=delete-user&id<?= $user->getId() ?>">Supprimer</a>
                            </div>
                        </div>
                        <?php
                    } ?>
                    <?php
                } else { ?>
                <?php }
                ?>

            </div>
        </div>
    </div>
</div>
