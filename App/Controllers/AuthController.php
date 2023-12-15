<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\Profile;
use DateTime;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return ViewResponse
     */

    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect($this->url("home.index"));
    }

    public function register(): Response
    {
        $users = Profile::getAll();
        $formData = $this->app->getRequest()->getPost();
        $data = [];
        if (isset($formData['submit'])) {

            $registered = $this->app->getAuth()->register($formData['login'], $formData['email']);
            if (!$registered) {
                $data = ['message' => "Pouzivatel s loginom 'login' uz existuje."];
                return $this->html($data);

            } else {
                $profile = new Profile();
                $profile->setLogin($formData['login']);
                $profile->setEmail($formData['email']);
                $profile->setPassword($formData['password']);
                $profile->setPicture("public/images/blank-profile-picture.png");
                $profile->save();
                return $this->redirect($this->url("auth.login"));


            }

        }

        return $this->html();
    }


}
