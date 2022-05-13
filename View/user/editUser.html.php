<?php
    use creepy\Controller\AbstractController;
    use creepy\Controller\UserController;
    use creepy\Model\Entity\User;
    use creepy\Model\Entity\Role;
    use creepy\Model\Manager\UserManager;

?>
<div class="container-form">
    <h1>Modifier mes information</h1>

    <div id="form-register">
        <form action="/index.php?c=user&a=edit-user&id=<?=$_SESSION['user']->getId() ?>" onsubmit="return validateForm()" method="post" name="formRegister" id="register">
            <div class="div-lab">
                <label for="lastname">Nom : <span><?=$_SESSION['user']->getLastname() ?></span></label>
                <input type="text" name="lastname" id="lastname" placeholder="nouveau nom">
            </div>
            <div class="div-lab">
                <label for="firstname">Prenom : <span><?=$_SESSION['user']->getFirstname() ?></span> </label>
                <input type="text" name="firstname" id="firstname" placeholder="nouveau prenom">
            </div>
            <div class="div-lab">
                <label for="pseudo">pseudo : <?=$_SESSION['user']->getPseudo() ?></label>
                <input type="text" name="pseudo" id="pseudo" placeholder="nouveau pseudo">
            </div>
            <div class="div-lab">
                <label for="email">E-mail : <span><?=$_SESSION['user']->getEmail() ?></label>
                <input type="email" name="email" id="email" placeholder="nouveau mail">
            </div>
            <div class="div-lab">
                <label for="password">Password : *********</label>
                <input type="password" name="password" id="password" placeholder="nouveau mot de passe">
            </div>
            <div class="div-lab button-inc">
                <input type="submit"  value="envoi" name="modif" class="save">
            </div>

        </form>
    </div>
</div>
