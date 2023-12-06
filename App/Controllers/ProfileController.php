<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Profile;
use App\Models\Recipe;
use DateTime;

class ProfileController extends AControllerBase
{
    public function register(): Response
    {
        $users = Profile::getAll();
        $formData = $this->app->getRequest()->getPost();
        $data = [];
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
        if ($this->app->getAuth()->isLogged()) {
            $profile = $this->app->getAuth()->getProfile($this->app->getAuth()->getLoggedUserName());
        }

        $formData = $this->app->getRequest()->getPost();
        if (isset($formData['sumbit_email'])) {
            if ($this->verify($formData['email'])) {
                $profile->setEmail($formData['email']);
                $profile->save();
                return $this->html(
                    ['user' => $profile, 'success' => "Zmena emailu sa podarila !"
                    ], 'index'
                );
            } else {
                return $this->html(
                    ['user' => $profile, 'message' => "Zmena emailu sa nepodarila !"
                    ], 'index');
            }
        }

        if (isset($formData['sumbit_password'])) {
            if ($formData['password'] != $profile->getPassword()) {
                return $this->html(
                    ['user' => $profile, 'message' => "Zadali ste zle stare_heslo!"
                    ], 'index'
                );
            }
            if ($formData['new_password'] != $formData['password_retype']) {
                return $this->html(
                    ['user' => $profile, 'message' => "Zadane hesla sa nezhoduju !"
                    ], 'index'
                );
            }
            $profile->setPassword($formData['new_password']);
            $profile->save();
            return $this->html(
                ['user' => $profile,
                    'success' => "Zmena hesla sa podarila !"
                ], 'index'
            );

        }

        return $this->html(
            ['user' => $profile

            ], 'index'
        );
    }

    public function verify($email): bool
    {
        $profiles = Profile::getAll();
        if ($email != null) {
            foreach ($profiles as $i) {
                if ($i->getEmail() == $email) {
                    return false;
                }
            }
        }
        return true;
    }


}