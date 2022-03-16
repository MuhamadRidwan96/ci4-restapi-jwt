<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ModelAuth extends Model{

    protected $table = "authentikasi";
    protected $primarykey = "id";
    protected $allowedFields = ['username','email','password'];

    function getEmail($email){
        $builder = $this->table('authentikasi');
        $data = $builder->where('email', $email)->first();

        if(!$data){
            throw new Exception('user tidak ditemukan');
        } return $data;
    }

}