<?php
use creepy\Controller\AbstractController;
use creepy\Controller\UserController;
use creepy\Model\Entity\User;
use creepy\Model\Entity\Role;
use creepy\Model\Manager\UserManager;
$user = $data['user'];
?>

<div>
    <div>
        <h1>Information d'utilisateur</h1>
    </div>
    <div>
        <p>ID: <?= $user->getId() ?></p>
        <p>Email: <?= $user->getEmail() ?></p>
        <p>Firstname: <?= $user->getFirstname() ?></p>
        <p>Lastname: <?= $user->getLastname() ?></p>
    </div>
</div>
