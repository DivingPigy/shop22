<?php

namespace App\Repositories\Plateform;

use App\Models\Plateform;
use App\Models\Game;

class PlateformRepository implements PlateformRepositoryContract
{
    /**
     * 获取所有的平台
     *
     * @return plateform collection 
     */
    public function all()
    {
        return Plateform::all();
    }

    /**
     * 存储新创建的平台
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Plateform::create($data);
    }

    /**
     * 删除特定id的平台
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        Plateform::destroy($id);
    }

    /**
     * 获取特定id的平台
     *
     * @param integer $id
     * @return plateform model instance
     */
    public function find($id)
    {
        return Plateform::findOrFail($id);
    }

    /**
     * 修改平台数据
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update($data, $id)
    {
        $plateform = Plateform::findOrFail($id);

        $plateform -> fill($data) ->save();
    }

    /**
     * 是否能够删除用户
     *
     * @param integer $id
     * @return boolean
     */
    public function canDelete($id)
    {
        $games = Game::where('plateform_id' , $id) -> get();
        return $games -> isEmpty();
    }
}