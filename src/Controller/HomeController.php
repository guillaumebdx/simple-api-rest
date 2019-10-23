<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HomeController
{

    /**
     * Retrieve root endpoint
     *
     * @return string
     */
    public function index()
    {
        return json_encode(['documentation' => 'https://github.com/guillaumebdx/simple-api-rest#readme']);
    }
}
