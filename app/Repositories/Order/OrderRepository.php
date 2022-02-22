<?php

namespace App\Repositories\Order;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Inventory;
use App\Services\DownloadFile;

class OrderRepository implements OrderRepositoryContract
{
    /**
     * 获取所有订单
     *
     * @return order collection
     */
    public function all()
    {
        return Order::where('id' , '>=' , 0) -> with('game') -> with('custmer') ->  with('exchange') -> orderBy('created_at', 'desc') -> get();
    }

    /**
     * 存储新创建的订单
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Order::create($data);
    }

    /**
     * 提取特定的订单
     *
     * @param integer $id
     * @return boolean
     */
    public function fetch($id)
    {
        $order = Order::findOrFail($id);
        $inventories = Inventory::where('game_id' , $order -> game_id) -> where('state' , config('const.GAME_CODE_NOT_DEAL'))
        -> where('order_id' , null) -> where('retail_id' , null) -> take($order -> total) -> get();

        if($inventories -> count() < $order -> total){
            return false;
        }
        foreach($inventories as $inventory)
        {
            $inventory -> state = config('const.GAME_CODE_DEALING');
            $inventory -> order_id = $id;
            $inventory -> extracter = Auth::user() -> name;
            $inventory -> save();
        }

        $path = $this -> generateDownloadFile($id);
        $order -> path = $path;
        $order -> state = config('const.ORDER_ON');
        $order -> save();
        return true;
    }

    /**
     * 产生特定id的订单结果，生成压缩包
     *
     * @param integer $id
     * @return string 压缩包路径
     */
    protected function generateDownloadFile(int $id){
        $file = new DownloadFile($id);
        $path = $file -> generateDownloadFile();
        return $path;
    }

    /**
     * 特定id的订单确认
     *
     * @param integer $id
     * @return boolean
     */
    public function comfirm(int $id)
    {
        $order = Order::findOrFail($id);
        $order -> state = config('const.ORDER_FINISH');
        $order -> save();
        $inventories = Inventory::where('order_id' , $id) -> get();
        foreach($inventories as $inventory){
            $inventory -> state = config('const.GAME_CODE_DEALT');
            $inventory -> save();
        }
        return true;
    }

    /**
     * 采购搜索方法
     *
     * @param [array] $data
     * @return order collection
     */
    public function search(array $data)
    {
        $orders = Order::with('custmer') -> with('exchange') -> with('game') -> where('id' , '>=' , 0) -> orderBy('created_at', 'desc');
        if( isset($data['game_id']) && $data['game_id'] != null){
            $orders = $orders -> where('game_id' , $data['game_id']);
        }
        if( isset($data['state']) && $data['state'] != null){
            $orders = $orders -> where('state' , $data['state']);
        }
        if( isset($data['start']) && $data['start'] != null && isset($data['end']) && $data['end'] != null){
            $orders = $orders -> whereDate('created_at', '>=' , $data['start']) -> whereDate('created_at', '<=' , $data['end']);
        }        
        if( isset($data['custmer_id']) && $data['custmer_id'] != null){
            $orders = $orders -> where('custmer_id' , $data['custmer_id']);
        }
        return $orders -> paginate(10);
    }

}