<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\Profile;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class DummyAuthenticator implements IAuthenticator
{

    /**
     * DummyAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function login($login, $password): bool
    {
        $users = Profile::getAll();
        foreach ($users as $i) {
            if ($i->getLogin() == $login && $i->getPassword() == $password) {
                $_SESSION['user'] = $login;
                return true;
            }
        }
        return false;
    }

    /**
     * Logout the user
     */

    public function register($login, $email): bool
    {
        $users = Profile::getAll();
        foreach ($users as $i) {
            if ($i->getLogin() == $login && $i->getEmail() == $email) {
                return false;
            }
        }
        return true;
    }

    public function logout(): void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     * @throws \Exception
     */

    public function getLoggedUserName(): string
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("Profile not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    public function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    public function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    public function getLoggedUserId(): mixed
    {
        return $_SESSION['user'];
    }

    public function getProfile($login): Profile
    {
        $users = Profile::getAll();
        $current_user = null;
        foreach ($users as $i) {
            if ($i->getLogin() == $login) {
                $current_user = $i;
            }

        }
        return $current_user;
    }
}
