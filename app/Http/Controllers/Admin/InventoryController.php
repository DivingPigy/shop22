<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Inventory\InventoryRepositoryContract;
use App\Repositories\Game\GameRepositoryContract;
use App\Repositories\Plateform\PlateformRepositoryContract;
use App\Services\UploadsExcel;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * 数据库交互类
     *
     * @var InventoryRepositoryContract
     */
    protected $inventories;

    /**
     * construct function
     *
     * @param InventoryRepositoryContract $inventories
     */
    public function __construct(
        InventoryRepositoryContract $inventories , 
        GameRepositoryContract $games , 
        PlateformRepositoryContract $plateforms
        )
    {
        $this -> inventories = $inventories;
        $this -> games = $games;
        $this -> plateforms = $plateforms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this -> games -> all();
        return view('manage.inventories.index' , ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showImport(int $id)
    {
        $game = $this -> games -> find($id);
        $plateforms = $this -> plateforms -> all();
        return view('manage.inventories.import' , ['game' => $game , 'plateforms' => $plateforms]);
    }

    public function saveImport(Request $request)
    {
        $excel = new UploadsExcel($request['excel']);
        $codes = $excel -> getCodetoArray();
        $this -> storeCode( $request -> game_id , $codes);
        return redirect() -> route('inventories.index');
    }

    protected function storeCode($id , $codes)
    {
        foreach($codes as $code)
        {
            Inventory::create(['game_id' => $id , 'state' => '未使用' , 'extracter' => '张三' , 'extract_time' => date('2020-4-30') , 'content' => $code]);
        }
    }
}
