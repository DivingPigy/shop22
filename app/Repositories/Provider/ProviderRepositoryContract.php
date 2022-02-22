<?php

namespace App\Repositories\Provider;

interface ProviderRepositoryContract
{
    public function all();
    public function store($data);
    public function destroy($id);
    public function find($id);
    public function update($data, $id);
    public function canDelete($id);
}