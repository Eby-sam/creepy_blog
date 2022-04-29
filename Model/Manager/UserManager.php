<?php

namespace creepy\Model\Manager;

use creepy\Model\Entity\User;
use creepy\Model\Entity\Role;

use DataBase;

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



    public static function getUser() {

    }


    public static function addUser(user & $user): bool {
        $stmt = DataBase::DataConnect()->prepare("
            INSERT INTO " . self::TABLE . " ( firstname,lastname,pseudo,password,email,role_fk) 
            VALUES (:email, :firstname, :lastname,:pseudo ,:password, :role_fk)
        ");

        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':pseudo', $user->getPseudo());
        $stmt->bindValue(':role_fk', $user->getRolefk()->getId());

        $result = $stmt->execute();
        $user->setId(DataBase::DataConnect()->lastInsertId());

        return $result;
    }

    public static function delete() {

    }

    private static function makeUser(array $data): User
    {
        $user = (new User())
            ->setId($data['id'])
            ->setPassword($data['password'])
            ->setEmail($data['email'])
            ->setLastname($data['lastname'])
            ->setFirstname($data['firstname']);

        return $user->setRoleFk(RoleManager::getRoleByUser($user));
    }
}