<?php

namespace App\Repositories\Game;

use App\Models\Game;
use App\Models\Import;
use App\Models\Retail;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class GameRepository implements GameRepositoryContract
{
    /**
     * 获取全部的游戏数据
     *
     * @return game collection 
     */
    public function all()
    {
        return Game::with('plateform') -> with('inventory') -> where('id' , '>=' , 0) -> paginate(10);
    }

    /**
     * 存储新创建的游戏
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Game::create($data);
    }

    /**
     * 删除特定id的游戏
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        Game::destroy($id);
    }

    /**
     * 获取特定id的游戏
     *
     * @param integer $id
     * @return game model instance
     */
    public function find($id)
    {
        return Game::findOrFail($id);
    }

    /**
     * 保存修改的游戏信息
     *
     * @param [array] $data
     * @param [integer] $id
     * @return void
     */
    public function update($data , $id)
    {
        $game = Game::findOrFail($id);

        $game -> fill($data) ->save();
    }

    /**
     * 验证能够删除特定id的游戏
     *
     * @param [integer] $id
     * @return boolean
     */
    public function canDelete($id)
    {
        $orders = Order::where('game_id' , $id) -> get();
        $retails = Retail::where('game_id' , $id) -> get();
        return $orders -> isEmpty() && $retails -> isEmpty();
    }

    /**
     * 模糊搜索
     *
     * @param [string] $name
     * @return game collection 
     */
    public function search($name)
    {
        return Game::where('name' , 'like' , '%'.$name.'%') -> with('plateform')  -> paginate(10);
    }
}