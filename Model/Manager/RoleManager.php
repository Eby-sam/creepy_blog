<?php
namespace creepy\Model\Manager;


use creepy\Model\Entity\Role;
use DataBase;
use creepy\Model\Entity\User;

class RoleManager
{
    public const TABLE = "cb_role";

    /**
     * @param User $user
     * @return array
     */
    public static function getRoleByUser(User $user): array
    {
        $roles = [];
        $query = DataBase::DataConnect()->query("
            SELECT * FROM TABLE WHERE id IN (SELECT role_fk FROM cb_user WHERE id = {$user->getId()})");
        if($query){
            foreach($query->fetchAll() as $roleData) {
                $roles[] = (new Role())
                    ->setId($roleData['id'])
                    ->setRoleName($roleData['role_name'])
                ;
            }
        }
        return $roles;
    }

    /**
     * @param string $roleName
     * @return Role
     */
    public static function getRoleByName(string $roleName): Role
    {
        $role = new Role();
        $rQuery = DataBase::DataConnect()->query("SELECT * FROM cb_role WHERE role_name = '".$roleName."'");

        if($rQuery && $roleData = $rQuery->fetch()) {
            $role->setId($roleData['id']);
            $role->setRoleName($roleData['role_name']);
        }
        return $role;
    }
}