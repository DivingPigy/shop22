<?php

namespace App\Repositories\Import;

interface ImportRepositoryContract
{
    public function all();
    public function store($data);
    public function canDelete($id);
    public function find($id);
    public function update($data , $id);
    public function storeExcel($data);
    public function storeZip($data);
    public function storeCode($data);    
    public function search(array $data);
    public function close(int $id);
}