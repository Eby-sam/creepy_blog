<?php

namespace creepy\Controller;

use creepy\Model\Entity\User;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\RoleManager;
use creepy\Model\Manager\UserManager;
use MongoDB\Driver\Manager;


class UserController extends AbstractController
{
    /**
     * @return void
     */
    public function index()
    {
        if (UserController::verifyUserConnect()) {
            $this->render('user/index', [
                'users_list' => UserManager::getAllUser()
            ]);
        } else {
            header('location: /index.php?c=home');
        }
    }

    /**
     * @return void
     */
    public function formEdit()
    {
        if (UserController::verifyUserConnect()) {
            $this->render('user/editUser');
        } else {
            header('location: /index.php?c=home');
        }
    }

    /**
     *information user
     * @param int $id
     * @return void
     */
    public function showUser(int $id)
    {
        if (!UserManager::userExists($id)) {
            $this->index();
        } else {
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
            if (isset($_POST['modif'])) {
                $error = [];
                $lastname = $this->dataClean($this->getFormField('lastname'));
                $firstname = $this->dataClean($this->getFormField('firstname'));
                $username = $this->dataClean($this->getFormField('pseudo'));
                $email = filter_var($this->getFormField('email'), FILTER_SANITIZE_EMAIL);
                $password = $this->dataClean($this->getFormField('password'));

                if (strlen($lastname) <= 3) {
                    $error[] = "Le nom doit contenir plus de trois caractères.";
                }


                if (strlen($firstname) <= 3) {
                    $error[] = "Le prenom doit contenir plus de trois caractères.";
                }


                if (strlen($username) <= 3) {
                    $error[] = "Le pseudo doit contenir plus de trois caractères.";
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error[] = "L'adresse email n'est pas au bon format.";
                }
                if (UserManager::mailExists($email)) {
                    $error[] = "Adresse email déjà utilisée !";
                }

                if (!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                    $error[] = "Le password ne correspond pas aux critères";
                }

                if (count($error) > 0) {
                    $_SESSION['errors'] = $error;
                } else {
                    if (!UserManager::mailExists($email)) {
                        $user = $_SESSION['user'];
                        $user
                            ->setLastname($lastname)
                            ->setFirstname($firstname)
                            ->setPseudo($username)
                            ->setEmail($email)
                            ->setPassword($password);
                        UserManager::updateUser($user);
                        header('location: /index.php?c=user');
                    }
                }
            }
        }
        $this->render('user/editUser');
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id)
    {
        if (UserManager::userExists($id)) {
            $user = UserManager::getUserById($id);
            $deleted = UserManager::deleteUser($user);
        }
        $this->index();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteUserConnected(int $id)
    {
        if (UserManager::userExists($id)) {
            $user = UserManager::getUserById($id);
            $deleted = UserManager::deleteUser($user);
        }
        header('location: /index.php?c=home');
        session_destroy();
    }

    /**
     * registration
     * @return void
     */
    public function register()
    {
        self::redirectIfConnected();

        if ($this->verifyFormSubmit()) {
            $firstname = $this->dataClean($this->getFormField('firstname'));
            $lastname = $this->dataClean($this->getFormField('lastname'));
            $pseudo = $this->dataClean($this->getFormField('pseudo'));
            $mail = $this->dataClean($this->getFormField('email'));
            $mailRepeat = $this->dataClean($this->getFormField('email-repeat'));
            $password = $_POST['password'];
            $passwordRepeat = $_POST['password-repeat'];

            $errors = [];
            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse mail n'est pas valide";
            }

            if ($mail !== $mailRepeat) {
                $errors[] = "Les email ne correspondent pas";
            }

            if ($password !== $passwordRepeat) {
                $errors[] = "Les password ne correspondent pas";
            }

            if (!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                $errors[] = "Le password ne correspond pas aux critères";
            }

            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
            } else {
                $user = new User();
                $role = RoleManager::getRoleByName('USER');
                $user
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setPseudo($pseudo)
                    ->setEmail($mail)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                    ->setRoleFk($role)
                    ->setToken(uniqid() . (new \DateTime())->format('Ydmhis'));

                $subject = 'Inscription réussie';
                $message = '
                <html>
                   <body>
                         <a href="https://creepy-blog.sam-eby.fr/index.php?c=user&a=validation&token=' . $user->getToken() . '">validation</a>
                    </body>
                 </html>';
                $message = wordwrap($message, 70, "\r\n");

                $headers = [
                    'Reply-To' => 'sam.coquelet@gmail.com',
                    'X-Mailer' => 'PHP/' . phpversion(),
                    'Mime-version' => '1.0',
                    'Content-Type' => 'text/html; charset=utf-8',
                    "From" => 'sam.coquelet@gmail.com',
                ];

                mail($mail, $subject, $message, $headers);
                if (!UserManager::mailExists($user->getEmail())) {
                    UserManager::addUser($user);

                    if (null !== $user->getId()) {
                        $_SESSION['success'] = "Compte activé";
                        $user->setPassword('');
                        $_SESSION['USER'] = $user;

                        header("Location: /index.php/?c=home");

                    } else {
                        $_SESSION['errors'] = ["Erreur d'enregistrement"];
                    }
                } else {
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

        if ($this->verifyFormSubmit()) {
            $errorMessage = "Données non correctes";
            $mail = $this->dataClean($this->getFormField('email'));
            $password = $this->getFormField('password');

            $user = UserManager::getUserByMail($mail);
            if (null === $user) {
                $_SESSION['errors'] = $errorMessage;
            } else {
                if (!$user->isValidate()) {
                    $_SESSION['errors'][] = 'Vous devez encore valider votre adresse e mail';
                }
                if (!password_verify($password, $user->getPassword())) {
                    $_SESSION['errors'][] = 'Mot de passe incorect';
                }
                if ($_SESSION['errors'] > 0) {
                    $this->index();
                    die();
                }
                $_SESSION['user'] = $user;
                $this->redirectIfConnected();
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
        if (self:: verifyUserConnect()) {
            $_SESSION['user'] = null;
            $_SESSION['messages'] = null;
            $_SESSION['success'] = null;
            session_unset();
            session_destroy();
        }

        $this->render('home/index', [
            'articles' => ArticleManager::getSCPLimit()
        ]);
    }

    public function validation(string $token)
    {
        if (UserManager::validation($token)) {
            $_SESSION['success'] = 'félicitation votre mail a bien était validé';
            $this->render('home/index', [
                'articles' => ArticleManager::getSCPLimit()
            ]);
        }

    }

}

