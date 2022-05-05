<?php
    use creepy\Controller\AbstractController;
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
        </div>
        <div id="user-article">
            <div>
                <div>MES ARTICLE</div>
                <div></div>


                <br><br><br><br><br>



            </div>
            <div>
                <h3 style="text-align: center">User</h3>
                <?php
                foreach ($data['users_list'] as $user) {
                    /* @var User $user */ ?>
                        <div>
                            <div style="display: flex; justify-content: space-between">
                                <a href="/index.php?c=user&a=show-user&id<?= $user->getId() ?>"><?= $user->getPseudo() ?></a>
                                <a href="/index.php?c=user&a=delete-user&id<?= $user->getId() ?>">Supprimer</a>
                            </div>
                        </div>
                     <?php
                } ?>
            </div>
        </div>
    </div>
</div>
