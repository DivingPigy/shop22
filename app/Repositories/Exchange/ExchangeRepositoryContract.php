<?php

namespace App\Repositories\Exchange;

interface ExchangeRepositoryContract
{
    public function all();
    public function store($data);
    public function destroy($id);
    public function update($data, $id);
    public function find($id);
    public function canDelete($id);
}