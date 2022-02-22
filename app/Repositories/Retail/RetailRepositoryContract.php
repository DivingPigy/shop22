<?php

namespace App\Repositories\Retail;

interface RetailRepositoryContract
{
    public function store($data);
    public function all();
    public function comfirm(int $id);
    public function search(array $data);
}