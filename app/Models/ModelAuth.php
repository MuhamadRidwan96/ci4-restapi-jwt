<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ModelAuth extends Model{

    protected $table = "authentikasi";
    protected $primaryKey = "id";
    protected $allowedFields = ['level','username','email','password','branch'];

    function getEmail($email){
        $builder = $this->table('authentikasi');
        $data = $builder->where('email', $email)->first();

        if(!$data){
            throw new Exception('user not found! ');
        } return $data;
    }

}