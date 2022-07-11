<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelProduction;

class Production extends BaseController{

use ResponseTrait;
function __construct()
{
    $this->models = new ModelProduction();
}

public function index(){
    $data = $this->models->orderBy('id_prod','desc')->findAll();
    return $this->respond($data,200);
}

public function show($id=null){

    $data = $this->models->where('id_prod',$id)->findAll();
    if(!$data){
        return $this->failNotFound("data not found! ");
    } else {
        return $this->respond($data,200);
    }
}

public function create($id=null){

    $data = $this->request->getPost();

    if($this->models->save($data)){
        return $this->fail($this->models->errors());
    } else {
        $response = [
            'status' => 201,
            'error'  => null,
            'messages' => [
                'success' => 'data has been created! '
            ]
            ];
            return $this->respond($response);
    }
}

public function update($id=null){
    $data = $this->request->getRawInput();
    $data['id_prod'] = $id;

    $isExist = $this->models->where('id_prod',$id)->findAll();
    if(!$isExist){
        return $this->failNotFound("data not found! ");
    } else if($this->models->save($data)){
        return $this->fail($this->models->errors());
    } else{
        $response = [
            'status' => 200,
            'error' => null,
            'messages' =>[
                'success' => 'data has been update! '
            ]

        ];
        return $this->respond($response);
    } 
    
}

public function delete($id=null){

    $data = $this->models->where('id_prod',$id)->findAll();
    if($data){
        $this->models->delete($id);
        $response = [
            'status' => 200,
            'error'  => null,
            'messages' =>[
                'success' => 'data has been deleted! '
            ]
        ];
        return $this->respondDeleted($response);
    } else {
        $this->failNotFound("data not founds! ");
    }

}


}