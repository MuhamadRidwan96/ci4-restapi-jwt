<?php namespace App\Controllers;

use App\Model\ModelAuth;
use CodeIgniter\API\ResponseTrait;
use Config\Services;


class Auth extends BaseController{

    use ResponseTrait;
    function __construct()
    {
        $this->model = new ModelAuth();
    }

}