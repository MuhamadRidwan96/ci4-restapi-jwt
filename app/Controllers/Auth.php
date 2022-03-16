<?php namespace App\Controllers;

use App\Model\ModelAuth as ModelModelAuth;
use App\Models\ModelAuth;
use CodeIgniter\API\ResponseTrait;
use Config\Services;


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
                    'required' => 'silahkan masukan username anda'
                ]
                ],
            'email' => [
                'rules' => 'required|valid_email',
                'error' =>[
                    'required' => 'silahkan masukan email anda',
                    'valid_email' => 'email anda tidak valid'
                ]
                ],
                'password' => [
                    'rules' => 'required',
                    'error' => [
                        'required' => 'silahkan masukan password anda'
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
                    if($data['password'] !=md5($password)){
                        return $this->fail('password tidak sesuai');
                    } else {
                         
                        helper('jwt');
                        $response = [
                        'status' => 'authentikasi berhasil',
                        'data' => $data,
                        'access_token' => createJWT($email)
                        ];
                        return $this->respond($response);
                    }
    }

}