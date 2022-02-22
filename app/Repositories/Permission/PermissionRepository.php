<?php

namespace App\Repositories\Permission;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    public function all()
    {
        return Permission::all();
    }

    public function store($request)
    {
        Permission::create(['name' => $request -> name]);
    }

    public function destroy($id)
    {
        Permission::destroy($id);
    }
}