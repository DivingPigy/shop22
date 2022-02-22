<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory;

class InventoryRepository implements InventoryRepositoryContract
{
    /**
     * 根据游戏的id获取对应的库存
     *
     * @param [type] $id
     * @return inventory collection
     */
    public function inventory($id)
    {
        return Inventory::where('game_id' , $id) -> where('state' , config('const.GAME_CODE_NOT_DEAL')) -> with('game') ->paginate(10);
    }

    /**
     * 根据id获得已经完成的交易验证码
     *
     * @param int $id
     * @return blade view
     */
    public function sold($id)
    {
        return Inventory::where('game_id' , $id) -> where('state' , config('const.GAME_CODE_DEALT')) -> with('game') ->paginate(10);
    }

    /**
     * 根据id获得交易中的验证码
     *
     * @param int $id
     * @return blade view
     */
    public function dealing($id)
    {
        return Inventory::where('game_id' , $id) -> where('state' , config('const.GAME_CODE_DEALING')) -> with('game') ->paginate(10);
    }
}