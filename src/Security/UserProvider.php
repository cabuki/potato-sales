<?php

namespace App\Security;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $users;

    /**
     * UserProvider constructor.
     * @param $users - Users are provided in the services.yaml file and are passed via injection
     */
    public function __construct( $users )
    {
        $this->users = $users;
    }

    /**
     * @param $username
     * @return UserInterface
     */
    public function loadUserByUsername($username): UserInterface
    {
        if (! $this->users[$username] )
        {
            throw new UsernameNotFoundException("Username not found : {$username}");
        }

        $user = new User($username, $this->users[$username]['firstname'], $this->users[$username]['lastname'], $this->users[$username]['password'], $this->users[$username]['roles']);
        var_dump($user);
        return $user;
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     */
    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
        }

        // Update the user info
        $user->setFirst($this->users[$user->getUsername()]['firstname']);
        $user->setLast($this->users[$user->getUsername()]['lastname']);

        return $user;
    }

    /**
     * Tells Symfony to use this provider for this User class.
     */
    public function supportsClass($class)
    {
        return User::class === $class || is_subclass_of($class, User::class);
    }
}
