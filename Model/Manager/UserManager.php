<?php

namespace creepy\Model\Manager;

use creepy\Model\Entity\Role;
use DataBase;
use creepy\Model\Entity\User;


class UserManager {
    public const TABLE = 'cb_user';


    public static function getAllUser(): array
    {
        $users = [];
        $result = DataBase::DataConnect()->query("SELECT * FROM " . self::TABLE);

        if($result) {
            foreach ($result->fetchAll() as $data) {
                $users[] = self::makeUser($data);
            }
        }
        return $users;
    }



    public static function addUser(user & $user): bool {
        $stmt = DataBase::DataConnect()->prepare("
            INSERT INTO " . self::TABLE . " (firstname,lastname,pseudo,email,password,role_fk) 
            VALUES (:firstname, :lastname,:pseudo , :email, :password, :role_fk)
        ");

        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':pseudo', $user->getPseudo());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':role_fk', $user->getRoleFk()->getId());

        $result = $stmt->execute();
        $user->setId(DataBase::DataConnect()->lastInsertId());

        return $result;
    }

    public static function delete() {

    }

    /*
     * @param array $data
     */
    private static function makeUser(array $data): User {
        $user = (new User())
            ->setId($data['id'])
            ->setLastname($data['lastname'])
            ->setFirstname($data['firstname'])
            ->setPseudo($data['pseudo'])
            ->setEmail($data['email'])
            ->setPassword($data['password']);


        return $user->setRoleFk(RoleManager::getRoleByUser($user));
    }

    /**
     * verify user exist
     * @param int $id
     * @return bool
     */
    public static function userExists(int $id): bool
    {
        $result = DataBase::DataConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * return user by id
     * @param int $id
     * @return User|null
     */
    public static function getUserById(int $id): ?User
    {
        $result = DataBase::DataConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeUser($result->fetch()) : null;
    }

    /**
     * verify mail exist
     * @param string $mail
     * @return bool
     */
    public static function mailExists(string $mail): bool
    {
        $result = DataBase::DataConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE email = \"$mail\"");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param string $mail
     * @return User|null
     */
    public static function getUserByMail(string $mail): ?User
    {
        $stmt = DataBase::DataConnect()->prepare("SELECT * FROM " . self::TABLE . " WHERE email = :email");
        $stmt->bindParam(':email', $mail);
        return $stmt->execute() ? self::makeUser($stmt->fetch()) : null;
    }
}