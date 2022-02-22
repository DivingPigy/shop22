<?php
namespace App\Repositories\Permission;

interface PermissionRepositoryContract
{
    public function all();
    public function store($request);
    public function destroy($id);
}