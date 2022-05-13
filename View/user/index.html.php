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
                   <p>Role : <span><?=UserManager::getUserById($_SESSION['user']->getId())->getRoleFk()->getRoleName() ?></span></p>
               </div>
            </div>
            <br><br>
            <div id="upUse">
                <a href="/index.php?c=user&a=edit-user&id=<?= $_SESSION['user']->getId() ?>">Modifié mes information</a>
            </div>
            <div id="supUse">
                <a href="/index.php?c=user&a=delete-users&id=<?= $_SESSION['user']->getId() ?>">supprimer mon compte</a>
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
                    <p>mot de passe, numéro de telephone, nom et prenom </p>
                </div>


                <br><br><br><br><br>
            </div>
            <div id="userList">
                <?php
                if (UserController::ifAdmin()) {?>
                    <h3>User List</h3>
                    <?php
                    foreach ($data['users_list'] as $user) {
                        /* @var User $user */ ?>
                        <div>
                            <div>
                                <a href="/index.php?c=user&a=show-user&id=<?= $user->getId() ?>" class="geting"><?= $user->getPseudo() ?></a>
                                <a href="/index.php?c=user&a=delete-user&id=<?= $user->getId() ?>" class="deleting">Supprimer</a>
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
        <?php
        if (UserController::ifAuthorOrAdmin()) {?>
        <div class="articleForm">

                <h2>Ajoutez un article</h2>
                <form action="/index.php?c=article&a=add-article" method="post" id="">
                    <div>
                        <label for="title"></label>
                        <input type="text" placeholder="Titre de l'article" id="title" name="title" required>
                    </div>
                    <div>
                        <label for="tag">Ajoutez un tag</label>
                        <select id="tag" name="tag">
                            <option value="3"></option>
                            <option value="1">horror</option>
                            <option value="2">scp</option>

                        </select>
                    </div>
                    <div>
                        <label for="content"></label>
                        <textarea name="content" class="content" id="contentUse" cols="50" rows="10" placeholder="Texte de l'article" required></textarea>
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
</div>
