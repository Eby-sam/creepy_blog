<?php

namespace creepy\Model\Entity;

use creepy\Model\Entity\AbstractEntity;
use creepy\Model\Entity\Role;



class User extends AbstractEntity
{
    private string $firstname;
    private string $lastname;
    private string $password;
    private string $email;
    private role $role_fk;
    private string $pseudo;
    private string $token;
    private bool $validate;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidate(): bool
    {
        return $this->validate;
    }

    /**
     * @param bool $validate
     */
    public function setValidate(bool $validate): self
    {
        $this->validate = $validate;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     * @return User
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRoleFk(): Role
    {
        return $this->role_fk;
    }

    /**
     * @param Role $role_fk
     * @return User
     */
    public function setRoleFk(Role $role_fk): self
    {
        $this->role_fk = $role_fk;
        return $this;
    }

}
