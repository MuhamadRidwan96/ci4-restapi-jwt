<?php namespace App\Controllers;

use App\Models\ModelAuth;
use CodeIgniter\API\ResponseTrait;
 


class Auth extends BaseController{

    use ResponseTrait;
    function __construct()
    {
        $this->model = new ModelAuth();
    }

    public function index(){

        $validation = \Config\Services::validation();

        $aturan = [
            'username' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'please insert your username '
                ]
                ],
            'email' => [
                'rules' => 'required|valid_email',
                'error' =>[
                    'required' => 'please insert your email ',
                    'valid_email' => 'email not valid'
                ]
                ],
                'password' => [
                    'rules' => 'required',
                    'error' => [
                        'required' => 'please insert your password'
                    ]
                ]
                    ];
    
                    $validation->setRules($aturan);
                    if(!$validation->withRequest($this->request)->run()){
                        return $this->fail($validation->getErrors());
                    }

                    $mods = new ModelAuth();
                    $email = $this->request->getVar('email');
                    $password = $this->request->getVar('password');

                    $data = $mods->getEmail($email);
                    if($data['password'] != md5($password)){
                        return $this->fail("password failed! ");
                    } else {
                         
                        helper('jwt');
                        $response = [
                        'status' => 'authentication success! ',
                        'data' => $data,
                        'access_token' => createJWT($email)
                        ];
                        return $this->respond($response);
                    }
    }

}