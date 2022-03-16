<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStock extends Model{

    protected $table = "stocks";
    protected $primarykey = "id";
    protected $allowedFields = ['mm','bin','item','available_stock','uom','gr_date'];

    protected $validationRules = [
        'mm' => 'required',
        'bin'=> 'required',
        'item' => 'required',
        'available_stock' => 'required',
        'uom' => 'required',
        'gr_date' => 'required'
    ];
    protected $validationMessage=[
        'mm' => [
            'required' => 'silahkan masukan mm'],
        'bin' => [
            'required' => 'silahkan masukan bin'],
        'items'=> [
            'required' => 'silahkan masukan item'],
        'available_stock' => [
            'required' => 'silahkan masukan qty'],
        'uom'   => [
            'required' => 'silahkan masukan uom'],
        'gr_date' => [
            'required' => 'silahkan masukan gr_date'
        ]
        ];

    
}