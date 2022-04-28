<?php

namespace creepy\Model\Manager;

use creepy\Model\Entity\User;
use creepy\Model\Entity\Role;
use DataBase;

class UserManager {
    public const TABLE = 'cb_user';


    public static function getAllUser() {

    }



    public static function getUser() {

    }


    public static function addUser(user & $user): bool {
        $stmt = DataBase::DataConnect()->prepare("
            INSERT INTO " . self::TABLE . " ( firstname,lastname,password,email,role_fk) 
            VALUES (:email, :firstname, :lastname, :password, :role_fk)
        ");

        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':role_fk', $user->getRolefk()->getId());

        $result = $stmt->execute();
        $user->setId(DataBase::DataConnect()->lastInsertId());

        return $result;
    }

    public static function delete() {

    }
}