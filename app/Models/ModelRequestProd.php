<?php namespace App\Models;

use CodeIgniter\Model;

class ModelRequestProd extends Model{

    protected $table = "tbl_req_prod";
    protected $primaryKey = "id_req_prod";
    protected $allowedFields = [
        'id_po',
        'no_po',
        'project_name',
        'driver',
        'truck_id',
        'address',
        'memo',
        'req_qty',
        'req_proses',
        'date_req',
        'id_user',
        'status_prod'
    ];

    protected $validationRules = [

        'id_po' => 'required',
        'no_po'=> 'required',
        'project_name'=> 'required',
        'driver'=> 'required',
        'truck_id'=> 'required',
        'address'=> 'required',
        'memo'=> 'required',
        'req_qty'=> 'required',
        'req_proses'=> 'required',
        'date_req'=> 'required',
        'id_user'=> 'required',
        'status_prod'=> 'required'
    ];

    protected $validationMessage =[
        'id_po' =>[
            'required'=>'please insert id purchase order'
        ],
        'no_po'=>[
            'required'=>'please insert number of purchase order'
        ],
        'project_name' => [
            'required'=>'please insert project name'
        ],
        'driver'=>[
            'required'=>'please insert driver'
        ],
        'truck_id'=>[
            'required'=>'please insert truck_id'
        ],
        'address'=>[
            'required'=>'please insert address'
        ],
        'memo'=>[
            'required'=>'please insert memo'
        ],
        'req_qty'=>[
            'required'=>'please insert request quantity'
        ],
        'req_proses'=>[
            'required'=>'please insert request proses'
        ],
        'date_req'=>[
            'required'=>'please insert date request production'
        ],
        'id_user'=>[
            'required'=>'please insert id user'
        ],
        'status_prod'=>[
            'required'=>'please insert status production'
        ]
    ];
}