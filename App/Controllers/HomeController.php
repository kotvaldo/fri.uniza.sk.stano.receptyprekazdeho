<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Recipe;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function recipes(): Response
    {
        return $this->html([
            'recipes' => Recipe::getAll()
        ]);
    }

    public function videoRecipes(): Response
    {
        return $this->html();
    }

    public function about(): Response
    {
        return $this->html();
    }

    public function add(): Response
    {
        return $this->html();
    }

}
