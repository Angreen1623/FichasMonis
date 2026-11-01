<?php

namespace App\Models;


abstract class Model
{
    protected $rows = [];

    private $errors = [];


    private function setErrors($msg){
        $this->errors[] = $msg;
    }

    public function getErrors(){
        return $this->errors;
    }
}