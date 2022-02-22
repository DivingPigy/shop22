<?php

namespace App\Repositories\Inventory;

interface InventoryRepositoryContract
{
    public function inventory($id);
    public function sold($id);
    public function dealing($id);
}