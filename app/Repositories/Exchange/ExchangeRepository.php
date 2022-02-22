<?php

namespace App\Repositories\Exchange;

use App\Models\Exchange;
use App\Models\Import;

class ExchangeRepository implements ExchangeRepositoryContract
{
    /**
     * 获取全部的外汇
     *
     * @return exchange model collection
     */
    public function all()
    {
        return Exchange::all();
    }

    /**
     * 存储新创建的外汇
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Exchange::create($data);
    }

    /**
     * 删除特定id的外汇
     *
     * @param [integer] $id
     * @return void
     */
    public function destroy($id)
    {
        Exchange::destroy($id);
    }

    /**
     * 修改外汇
     *
     * @param [array] $data
     * @param [integer] $id
     * @return void
     */
    public function update($data , $id)
    {
        $exchange = Exchange::findOrFail($id);

        $exchange -> fill($data) ->save();
    }

    /**
     * 获取特定id的外汇
     *
     * @param [integer] $id
     * @return exchange model instance
     */
    public function find($id)
    {
        return Exchange::findOrFail($id);
    }

    /**
     * 验证特定id的外汇能够被删除
     *
     * @param [integer] $id
     * @return boolean
     */
    public function canDelete($id)
    {
        $imports = Import::where('exchange_id' , $id) -> get();
        return $imports -> isEmpty();
    }
}