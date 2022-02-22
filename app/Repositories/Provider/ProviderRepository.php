<?php

namespace App\Repositories\Provider;

use App\Models\Provider;
use App\Models\Import;

class ProviderRepository implements ProviderRepositoryContract
{
    /**
     * 获取所有供货商
     *
     * @return provider collection
     */
    public function all()
    {
        return Provider::all();
    }

    /**
     * 存储新的供货商
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Provider::create($data);
    }

    /**
     * 删除特定id供货商
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {   
        Provider::destroy($id);
    }

    /**
     * 获取特定id的用户
     *
     * @param integer $id
     * @return provider model instance
     */
    public function find($id)
    {
        return Provider::findOrFail($id);
    }

    /**
     * 修改更新供货商
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update($data, $id)
    {
        $provider = Provider::findOrFail($id);
        $provider -> fill($data) ->save();
    }

    /**
     * 是否能够删除供货商
     *
     * @param integer $id
     * @return boolean
     */
    public function canDelete($id)
    {
        $providers = Import::where('provider_id' , $id) -> get();
        return $providers -> isEmpty();
    }
}