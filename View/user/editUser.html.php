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
                <label for="lastname">Nom : </label>
                <input type="text" name="lastname" id="lastname" placeholder="nouveau nom" value="<?=$_SESSION['user']->getLastname() ?>">
            </div>
            <div class="div-lab">
                <label for="firstname">Prenom : </label>
                <input type="text" name="firstname" id="firstname" placeholder="nouveau prenom" value="<?=$_SESSION['user']->getFirstname() ?>">
            </div>
            <div class="div-lab">
                <label for="pseudo">pseudo : </label>
                <input type="text" name="pseudo" id="pseudo" placeholder="nouveau pseudo" value="<?=$_SESSION['user']->getPseudo() ?>">
            </div>
            <div class="div-lab">
                <label for="email">E-mail : </label>
                <input type="email" name="email" id="email" placeholder="nouveau mail" value="<?=$_SESSION['user']->getEmail() ?>">
            </div>
            <div class="div-lab">
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" placeholder="nouveau mot de passe">
            </div>
            <div class="div-lab button-inc">
                <input type="submit"  value="envoi" name="modif" class="save">
            </div>

        </form>
    </div>
</div>
