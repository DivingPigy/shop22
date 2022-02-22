<?php

namespace App\Repositories\Custmer;

interface CustmerRepositoryContract
{
    public function all();
    public function store($data);
    public function destroy($id);
    public function find($id);
    public function update($data , $id);
    public function canDelete($id);
}