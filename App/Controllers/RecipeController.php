<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Category;
use App\Models\Recipe;
use DateTime;

class RecipeController extends AControllerBase
{

    /**
     * @inheritDoc
     */


    public function add():Response {

        $now = new DateTime();
        $categories = Category::getAll();

        $formData = $this->app->getRequest()->getPost();
        if (isset($formData['submit'])) {
            $recipe = new Recipe();
            $recipe->setTitle($formData['title']);
            $recipe->setText($formData['text']);
            $recipe->setCategoryName($formData['categories']);
            $recipe->setPicture(null);
            $recipe->setUserLogin($this->app->getAuth()->getLoggedUserName());
            $recipe->setDateCreated($now->format("Y-m-d-H-i-s"));
            $recipe->save();
            return $this->html([
                'categories' => $categories,
                'success' => "Uspesne pridanie prispevku!"
            ], 'add');
        }

        return $this->html([
            'categories' => $categories
        ], 'add');
    }
    public function index(): Response
    {
        return $this->html();
    }




}