<?php 

Namespace App\Models;

use CodeIgniter\Model;

class ModelProduction extends Model{

    protected $table = 'tbl_produksi_vub';
    protected $primaryKey = 'id_prod';
    protected $allowedFields = [
        'id_req_prod',
        'no_po',
        'project_name',
        'delivery_no',
        'station',
        'operator',
        'comp_qty',
        'date_prod',
        'id_user',
        'status_prod'
    ];

    protected $validationRules = [

        'id_req_prod' => 'required',
        'no_po' => 'required',
        'project_name' => 'required',
        'delivery_no' => 'required',
        'station' => 'required',
        'operator' => 'required',
        'comp_qty' => 'required',
        'date_prod' => 'required',
        'id_user' => 'required',
        'status_prod' => 'required'

    ];

    protected $validationMessage = [
        'id_req_prod' =>[
            'required' => 'please insert id request production'
        ],
        'no_po'=>[
            'required' => 'please insert number of Purchase Order'
        ],
        'project_name' =>[
            'required' => 'please insert project name'
        ],
        'delivery_no' => [
            'required'=> 'please insert delivery number'
        ],
        'station' => [
            'required' => 'please insert station'
        ],
        'operator' => [
            'required' => 'please insert operator'
        ],
        'comp_qty' => [
            'required' => 'please insert completed quantity'
        ],
        'date_prod' => [
            'required' => 'please insert current date'
        ],
        'id_user' => [
            'required' => 'please insert id user'
        ],
        'status_prod' => [
            'required' => 'please insert status production'
        ]
    ];



    
}