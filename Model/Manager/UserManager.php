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
            INSERT INTO " . self::TABLE . " (firstname,lastname,pseudo,password,email,role_fk) 
            VALUES (:email, :firstname, :lastname,:pseudo ,:password, :role_fk)
        ");

        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':pseudo', $user->getPseudo());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':pseudo', $user->getPseudo());
        $stmt->bindValue(':role_fk', $user->getRoleFk()->getId());

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
            ->setPseudo($data['pseudo'])
            ->setLastname($data['lastname'])
            ->setFirstname($data['firstname'])
            ->setRoleFk($data['Role_fk']);

        return $user->setRoleFk(RoleManager::getRoleByUser($user));
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
}