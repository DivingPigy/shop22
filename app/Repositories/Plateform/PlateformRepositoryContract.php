<?php
namespace App\Repositories\Plateform;

interface PlateformRepositoryContract
{
    public function all();
    public function store($data);
    public function destroy($id);
    public function find($id);
    public function update($data, $id);
    public function canDelete($id);
}