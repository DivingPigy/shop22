<?php

namespace App\Repositories\Custmer;

use App\Models\Custmer;
use App\Models\Order;

class CustmerRepository implements CustmerRepositoryContract
{
    /**
     * 获取全部客户列表
     *
     * @return custmer model collection
     */ 
    public function all()
    {
        return Custmer::all();
    }

    /**
     * 存储新创建的客户
     *
     * @param array $data
     * @return void
     */
    public function store($data){
        Custmer::create($data);
    }

    /**
     * 删除特定id的客户
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        Custmer::destroy($id);
    }

    /**
     * 后去特定id的客户
     *
     * @param integer $id
     * @return custmer model instance 
     */
    public function find($id)
    {
        return Custmer::findOrFail($id);
    }

    /**
     * 修改客户
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update($data , $id)
    {
        $custmer = Custmer::findOrFail($id);
        $custmer -> fill($data) -> save();
    }

    /**
     * 验证客户能否被删除
     *
     * @param integer $id
     * @return boolean
     */
    public function canDelete($id)
    {
        $orders = Order::where('custmer_id' , $id) -> get();
        return $orders -> isEmpty();
    }
}