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
        $now = new DateTime();
        $users = Profile::getAll();
        $formData = $this->app->getRequest()->getPost();

        if (isset($formData['submit'])) {

            if ($formData['password'] != $formData['password_retype']) {
                $errors[] = "Pole 'password_retype' sa nezhoduje s 'password'";
                return $this->html(["errors" => $errors, "formData" => $formData], "form");
            }
            foreach ($users as $i) {
                if ($i->getLogin() == $formData['login']) {
                    $errors[] = "Login 'login' je zabraty.";
                    return $this->html(["errors" => $errors, "formData" => $formData], "form");
                }
                if ($i->getEmail() == $formData['email']) {
                    $errors[] = "Pouzivatel s emailom 'email' uz existuje.";
                    return $this->html(["errors" => $errors, "formData" => $formData], "form");
                }
            }

            $profile = new Profile();
            $profile->setLogin($formData['login']);
            $profile->setEmail($formData['email']);
            $profile->setPassword($formData['password']);
            $profile->setPicture(null);
            $profile->save();
            return $this->html();

        }
        return $this->html();
    }

    public function index(): Response
    {
        return $this->html();
    }
}