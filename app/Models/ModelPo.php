<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPo extends Model{

    protected $table = "tbl_po_vub";
    protected $primaryKey = "id_po";
    protected $allowedFields = [
        'no_po',
        'id_project',
        'project_name',
        'date_po',
        'company_name'
        ,'item_code',
        'item_name',
        'qty_po',
        'qty_proses',
        'id_user'];

    protected $validationRules = [

        'no_po'=>'required',
        'id_project'=>'required',
        'project_name'=>'required',
        'date_po'=>'required',
        'company_name'=>'required',
        'item_code'=>'required',
        'item_name'=>'required',
        'qty_po'=>'required',
        'qty_proses'=>'required',
        'id_user'=>'required'
    ];
    protected $validationMessage=[
        'no_po' => [
            'required' => 'please insert number of purchase order'],
        'id_project' => [
            'required' => 'please insert id project'],
        'project_name'=> [
            'required' => 'please insert project name'],
        'date_po' => [
            'required' => 'please insert date of purchase order'],
        'company_name'   => [
            'required' => 'please insert company name'],
        'item_code' => [
            'required' => 'please insert item code'],
        'item_name' => [
            'required' => 'please insert item name'],
        'qty_po' => [
            'required' => 'please insert quantity purchase order'],
        'qty_proses' => [
            'required' => 'please insert quantity proses'],
        'id_user' => [
            'required' => 'please insert id_user'],
        ];

    
}