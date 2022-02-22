<?php

namespace App\Repositories\Game;

interface GameRepositoryContract
{
    public function all();
    public function store($data);
    public function destroy($id);
    public function find($id);
    public function update($data , $id);
    public function canDelete($id);
    public function search($name);
}