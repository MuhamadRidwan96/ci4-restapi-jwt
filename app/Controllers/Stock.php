<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelStock;

class Stock extends BaseController{
    
    use ResponseTrait;
    function __construct()
    {
        $this->model = new ModelStock();
    }

    public function index(){

        $data = $this->model->orderBy('mm','asc')->findAll();
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
                    'success' => 'data berhasil di buat'
                ]
                ];
                return $this->respond($response);
        }
    }

    public function show($id=null){
        
        $data = $this->model->where('id', $id)->findAll();
        if(!$data){
            return $this->failNotFound("data tidak ditemukan");
        } else{
            return $this->respond($data, 200);
        }
    }

    public function update($id=null){

        $data = $this->request->getRawInput();
        $data['id'] = $id;

        $isExcist = $this->model->where('id', $id)->findAll();
        if(!$isExcist){
            return $this->failNotFound("data tidak ditemukan");
        }
        if(!$this->model->save($data)){
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 200,
            'error'  => null,
            'messages' => [
                'success' => 'data berhasil di update'
            ]
            ];
            return $this->respond($response);
    }

    public function delete($id=null){
        $data =$this->model->where('id', $id)->findAll();
        if($data){
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error'  => null,
                'messages' => [
                    'success' => 'data berhasil di hapus'
                ]
                ];
                return $this->respondDeleted($response);
        } else {
            return $this->failNotFound("data tidak ditemukan");
        }
    }
}