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
            'required' => 'please insert mm'],
        'bin' => [
            'required' => 'please insert bin'],
        'items'=> [
            'required' => 'please insert item'],
        'available_stock' => [
            'required' => 'please insert qty'],
        'uom'   => [
            'required' => 'please insert uom'],
        'gr_date' => [
            'required' => 'please insert gr_date']
        ];

    
}