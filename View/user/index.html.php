<?php
    use creepy\Controller\AbstractController;
    use creepy\Model\Entity\User;

?>
<div id="container-user">
    <div class="divTitle">
        <h1>PROFIL</h1>
    </div>
    <div class="profil">
        <div id="info-user">
            <div>
                <h2></h2>
            </div>
            <div>

            </div>
        </div>
        <div id="user-article">
            <div>
                <div>MES ARTICLE</div>
                <div></div>
            </div>
            <div>
                <?php
                foreach ($data['users_list'] as $user) {
                    /* @var User $user */ ?>
                        <div>
                            <div>
                                <p><?= $user->getId() ?></p>
                                <a href="/index.php?c=user&a=show-user"><?= $user->getPseudo() ?></a>
                            </div>
                            <div>
                                <a href="/index.php?c=user&a=show-user=<?= $user->getId() ?>">Voir plus</a>
                                <a href="/index.php?c=user&a=delete-user=<?= $user->getId() ?>">Supprimer</a>
                            </div>
                        </div>
                     <?php
                } ?>
            </div>
        </div>
    </div>
</div>
