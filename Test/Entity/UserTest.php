<?php

require __DIR__ . '/../../Model/Entity/AbstractEntity.php';
require __DIR__ . '/../../Model/Entity/User.php';
require __DIR__ . '/../../Model/DataBase.php';

use creepy\Model\Entity\Role;
use creepy\Model\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    private string $lastname;
    private string $email;


    /**
     * @return string
     */
    /**
     * @return UserTest
     */
    public function testSetLastname(): UserTest
    {
        $result = $this->lastname = 'nom';
        $this->assertIsString($result);
        return $this;
    }

    public function testSetEmail(): UserTest
    {
        $result = $this->email= 'email';
        $this->assertIsString($result);
        return $this;
    }

}
