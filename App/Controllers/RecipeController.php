<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Category;

class RecipeController extends AControllerBase
{

    /**
     * @inheritDoc
     */


    public function add():Response {

        $strings = [];
        foreach ($categories = Category::getAll() as $i) {
            $strings[] = $i->getNazov();

        }
        return $this->html([
            'categories' => $strings
        ], 'add');
    }
    public function index(): Response
    {
        return $this->html();
    }




}