<?php

namespace creepy\Controller;

use creepy\Model\Entity\User;
use creepy\Model\Manager\RoleManager;
use creepy\Model\Manager\UserManager;


class UserController extends AbstractController
{
    /**
     * @return void
     */
    public function index()
    {
        $this->render('user/index', [
            'users_list' => UserManager::getAllUser()
        ]);
    }

    /**
     *information user
     * @param int $id
     * @return void
     */
    public function showUser(int $id)
    {
        if(!UserManager::userExists($id)) {
            $this->index();
        }
        else {
            $this->render('user/show-user', [
                'user' => UserManager::getUserById($id),
            ]);
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function editUser(int $id)
    {
        if (UserManager::userExists($id)) {
            $user = UserManager::getUserById($id);
        }
        $this->index();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id)
    {
        if(UserManager::userExists($id)) {
            $user = UserManager::getUserById($id);
            $deleted = UserManager::deleteUser($user);
        }
        $this->index();
    }

    /**
     * registration
     * @return void
     */
    public function register()
    {
        self::redirectIfConnected();

        if($this->verifyFormSubmit()) {
            $firstname = $this->dataClean($this->getFormField('firstname'));
            $lastname = $this->dataClean($this->getFormField('lastname'));
            $pseudo = $this->dataClean($this->getFormField('pseudo'));
            $mail = $this->dataClean($this->getFormField('email'));
            $password = $_POST['password'];
            $passwordRepeat = $_POST['password-repeat'];

            $errors = [];
            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse mail n'est pas valide";
            }

            if($password !== $passwordRepeat) {
                $errors[] = "Les password ne correspondent pas";
            }

            if(!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                $errors[] = "Le password ne correspond pas aux critères";
            }

            if(count($errors) > 0) {
                $_SESSION['errors'] = $errors;
            }
            else {
                $user = new User();
                $role = RoleManager::getRoleByName('USER');
                $user
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setPseudo($pseudo)
                    ->setEmail($mail)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                    ->setRoleFk($role);

                if(!UserManager::mailExists($user->getEmail())) {
                    UserManager::addUser($user);
                    if(null !== $user->getId()) {
                        $_SESSION['success'] = "Compte activé";
                        $user->setPassword('');
                        $_SESSION['USER'] = $user;
                        header("Location: index.php/?c=home");
                    }
                    else {
                        $_SESSION['errors'] = ["Erreur d'enregistrement"];
                    }
                }
                else {
                    $_SESSION['errors'] = ["Adresse mail déjà existante"];
                }
            }
        }
        $this->render('user/register');
    }

    /**
     * login
     * @return void
     */
    public function connect()
    {
        self::redirectIfConnected();

        if($this->verifyFormSubmit()) {
            $errorMessage = "Données non correctes";
            $mail = $this->dataClean($this->getFormField('email'));
            $password = $this->getFormField('password');

            $user = UserManager::getUserByMail($mail);
            if (null === $user) {
                $_SESSION['errors'][] = $errorMessage;
            }
            else {
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['user'] = $user;
                    $this->redirectIfConnected();
                }
                else {
                    $_SESSION['errors'][] = $errorMessage;
                }
            }
        }

        $this->render('user/connect');
    }

    /**
     * logout
     * @return void
     */
    public function disconnected(): void
    {
        if(self:: verifyUserConnect()) {
            $_SESSION['user'] = null;
            $_SESSION['messages'] = null;
            $_SESSION['success'] = null;
            session_unset();
            session_destroy();
        }

        $this->render('home/index');
    }
}