<?php

namespace App\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $username;
    private $first;
    private $last;

    private $roles = [];

    /**
     * @var string The hashed password
     */
    private $password;

    public function __construct( $username = null, $first = null, $last = null, $password = null, $roles = [] )
    {
        $this->username = $username;
        $this->first = $first;
        $this->last = $last;
        $this->password = $password;
        $this->roles = $roles;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * @param mixed $first
     * @return $this
     */
    public function setFirst( $first ): User
    {
        $this->first = $first;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * @param mixed $last
     * @return $this
     */
    public function setLast( $last ): User
    {
        $this->last = $last;
        return $this;
    }

    public function getName(): string
    {
        return "{$this->first} {$this->last}";
    }

    public function __toString(): string
    {
        return "{$this->username} : {$this->getName()} : {$this->getPassword()}";
    }
}
