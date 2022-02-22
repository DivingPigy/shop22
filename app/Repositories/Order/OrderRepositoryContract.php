<?php

namespace App\Repositories\Order;

interface OrderRepositoryContract
{
    public function all();
    public function store($data);
    public function fetch(int $id);
    public function comfirm(int $id);
    public function search(array $data);
}