<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Hash;
use App\User;

class UserRepository implements UserRepositoryContract
{
    /**
     * 读取所有的用户
     *
     * @return users collection 
     */
    public function all()
    {
        return User::all();
    }

    /**
     * 存储新用户
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user -> syncPermissions([]);
    }

    /**
     * 根据id获取特定用户
     *
     * @param integer $id
     * @return user model instance
     */
    public function find(int $id)
    {
        return User::findOrFail($id);
    }

    /**
     * 用户授权
     *
     * @param Request $request
     * @return void
     */
    public function grant($request)
    {
        $user = User::findOrFail($request -> user);
        $permissions = $request -> permissions;
        $user -> syncPermissions($permissions);
    }
}