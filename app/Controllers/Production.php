<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelProduction;

class Production extends BaseController{
    
    use ResponseTrait;
    function __construct()
    {
        $this->model = new ModelProduction();
    }

    public function index(){

        $data = $this->model->orderBy('id_prod','asc')->findAll();
        return $this->respond($data, 200);
    }

    public function create(){
       
        $data = $this->request->getPost();

        if(!$this->model->save($data)){
            return $this->fail($this->model->errors());
        } else {
            $response = [
                'status' => 201,
                'error'  => null,
                'messages' => [
                    'success' => 'data has been created'
                ]
                ];
                return $this->respond($response);
        }
    }

    public function show($id=null){
        
        $data = $this->model->where('id_prod', $id)->findAll();
        if(!$data){
            return $this->failNotFound("data not found");
        } else{
            return $this->respond($data, 200);
        }
    }

    public function update($id=null){

        $data = $this->request->getRawInput();
        $data['id_prod'] = $id;

        $isExist = $this->model->where('id_prod',$id)->findAll();
        if(!$isExist){
            return $this->failNotFound("data not found");
        }
        if(!$this->model->save($data)){
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 200,
            'error'  => null,
            'messages' => [
                'success' => 'data has been update'
            ]
            ];
            return $this->respond($response);
    }

    public function delete($id=null){

        $data =$this->model->where('id_prod', $id)->findAll();
        if($data){
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error'  => null,
                'messages' => [
                    'success' => 'data has been deleted'
                ]
                ];
                return $this->respondDeleted($response);
        } else {
            return $this->failNotFound("data not found");
        }
    }
}