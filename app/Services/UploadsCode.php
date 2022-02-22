<?php

namespace App\Services;

class UploadsCode { 
    protected $data;

    public function __construct(array $data)
    {
        $this -> data = $data;
    }

    public function getCodes()
    {
        return explode("\r\n", $this -> data['codes']);
    }
}