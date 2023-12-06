<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Profile;
use DateTime;

class ProfileController extends AControllerBase
{
    public function register(): Response
    {
        $users = Profile::getAll();
        $formData = $this->app->getRequest()->getPost();
        $data = [];
        $now = new DateTime();
        if (isset($formData['submit'])) {

            if ($formData['password'] != $formData['password_retype']) {
                $data = ['message' => "Pole 'password_retype' sa nezhoduje s 'password'"];
                return $this->html($data);
            }

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
                $data = ['success' => "Uspesna registracia, môžete sa prihlásiť !"];
                return $this->html($data);

            }

        }
        return $this->html($data);
    }
    public function index(): Response
    {
        $data = [];
        $profile = null;
        if($this->app->getAuth()->isLogged()) {
            $profile = $this->app->getAuth()->getProfile($this->app->getAuth()->getLoggedUserName());
        }
        return $this->html(
           ['user' => $profile

           ], 'index'
        );
    }




}