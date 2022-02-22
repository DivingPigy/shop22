<?php

namespace App\Repositories\Retail;

use App\Models\Retail;
use App\Models\Game;

class RetailRepository implements RetailRepositoryContract
{
    /**
     * 存储新用户
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Retail::create($data);
    }

    /**
     * 获取所有临售信息
     *
     * @return retail collection
     */
    public function all()
    {
        return Retail::with('game') -> with('inventory') -> with('exchange') -> where('id' , '>=' , 0) -> orderBy('created_at', 'desc') -> get();
    }

    /**
     * 确认订单
     *
     * @param integer $id
     * @return boolean
     */
    public function comfirm(int $id)
    {
        $retail = Retail::findOrFail($id);
        $retail -> fill(['state' => config('const.RETAIL_FINISH')]) ->save();
        $inventory = $retail -> inventory;
        $inventory -> fill(['state' => config('const.RETAIL_FINISH')]) ->save();
        return true;
    }

    /**
     * 模糊搜索方法
     *
     * @param array $data
     * @return paginate collection
     */
    public function search(array $data)
    {
        $retails = Retail::with('game') -> with('inventory') -> with('exchange') -> where('id' , '>=' , 0) -> orderBy('created_at', 'desc');
        if( isset($data['comment']) && $data['comment'] != null){
            $retails = $retails -> where('comment' , 'like' , '%'.$data['comment'].'%');
        }

        if( isset($data['name']) && $data['name'] != null){
            $games = Game::where('name' , 'like' , '%'.$data['name'].'%') -> get('id');
            $game_arr = [];
            foreach($games as $game)
            {
                array_push($game_arr , $game -> id);
            }
            $retails = $retails -> whereIn('game_id', $game_arr);
        }
        return $retails -> paginate(10);     
    }
}