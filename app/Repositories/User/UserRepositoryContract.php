<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface UserRepositoryContract
{
    public function all();
    public function store($data);
    public function find(int $id);
    public function grant(Request $request);
}