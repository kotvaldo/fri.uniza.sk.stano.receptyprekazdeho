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

        //Zmena mailu
        if (isset($formData['submit_email'])) {
            if ($this->verify($formData['email'])) {
                $profile->setEmail($formData['email']);
                $profile->save();
                return $this->html([
                    'success_email' => "Zmena emailu sa podarila !",
                        'user' => $profile

                ],'index');
            } else {
                return $this->html([
                    'message_email' => "Email je uz pouzity!",
                    'user' => $profile

                ],'index');
            }
        }

        //Zmena hesla
        if (isset($formData['submit_password'])) {
            if ($formData['password'] != $profile->getPassword()) {
                return $this->html([
                    'message' => "Stare heslo sa nezhoduje !",
                    'user' => $profile

                ],'index');
            }
            if ($formData['new_password'] != $formData['password_retype']) {
                return $this->html([
                    'message' => "Hesla sa nezhoduju !",
                    'user' => $profile

                ],'index');
            }
            $profile->setPassword($formData['new_password']);
            $profile->save();
            return $this->html([
                'success' => "Zmena hesla prebehla uspesne!",
                'user' => $profile

            ],'index');

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

    public function delete(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $profile = $this->app->getAuth()->getProfile($this->app->getAuth()->getLoggedUserName());
        $profile->delete();
        return $this->redirect($this->url("auth.logout"));

    }

}