<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\Create;
use App\Http\Requests\Game\Update;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Game\GameRepositoryContract;
use App\Repositories\Plateform\PlateformRepositoryContract;
use App\Repositories\Exchange\ExchangeRepositoryContract;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * 数据库交互类
     *
     * @var [ExchangeRepositoryContract]
     */
    protected $exchanges;

    /**
     * 数据库交互类
     *
     * @var [GameRepositoryContract]
     */
    protected $games;

    /**
     * 数据库交互类
     *
     * @var [PlateformRepositoryContract]
     */
    protected $plateforms;
    /**
     * construct function 执行依赖注入
     *
     * @param GameRepositoryContract $games
     */

     /**
      * 磁盘类
      *
      * @var [file storage disk]
      */
     protected $disk;

    public function __construct(
        GameRepositoryContract $games , 
        PlateformRepositoryContract $plateforms , 
        ExchangeRepositoryContract $exchanges
    ) {
        $this -> games = $games;
        $this -> plateforms = $plateforms;
        $this -> exchanges = $exchanges;
        $this -> disk = Storage::disk('public');
        // $this -> middleware(['permission:游戏' , 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this -> games -> all();
        foreach ($games as $game ) {
            $game -> plateformName = $game -> plateform -> name;
        }
        return view('manage.games.index' , ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plateforms = $this -> plateforms -> all();
        $exchanges = $this -> exchanges -> all();
        return view('manage.games.create' , ['plateforms' => $plateforms , 'exchanges' => $exchanges]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $create)
    {
        $path = $create -> file('file') -> store('public' . DIRECTORY_SEPARATOR . 'cover');
        $path = str_replace("public" , "storage" , $path);
        $img = $create -> file('img') -> store('public' . DIRECTORY_SEPARATOR . 'images');
        $img = str_replace("public" , "storage" , $img);
        
        $create -> merge(['cover' => $path]);
        $create -> merge(['image' => $img]);
        $create -> merge(['creater' => '张三']);
        $this -> games -> store($create -> all());
        return redirect() -> route('games.index') -> with('message' , 'Create game successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this -> games -> find($id);
        $game -> plateform = $game -> plateform -> id;
        $plateforms = $this -> plateforms -> all();
        $exchanges = $this -> exchanges -> all();
        return view('manage.games.show' , ['game' => $game , 'plateforms' => $plateforms , 'exchanges' => $exchanges]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = $this -> games -> find($id);
        $game -> plateform = $game -> plateform -> id;
        $plateforms = $this -> plateforms -> all();
        $exchanges = $this -> exchanges -> all();
        return view('manage.games.edit' , ['game' => $game , 'plateforms' => $plateforms , 'exchanges' => $exchanges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        // $request->merge(['creater' => Auth::user() -> name]);
        $request->merge(['creater' => '张三']);

        $path = $request -> file('file') -> store('public' . DIRECTORY_SEPARATOR . 'cover');
        $path = str_replace("public" , "storage" , $path);
        $img = $request -> file('img') -> store('public' . DIRECTORY_SEPARATOR . 'images');
        $img = str_replace("public" , "storage" , $img);

        $request -> merge(['cover' => $path]);
        $request -> merge(['image' => $img]);

        $this -> games -> update($request -> all() , $id);
        return redirect() -> route('games.index') -> with('message' , 'Update game successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if($this -> games -> canDelete($id)){
        //     $this -> games -> destroy($id);
        //     flash('删除游戏成功') -> success() -> important();
        //     return redirect() -> route('game.index');
        // }
        $this -> games -> destroy($id);
        // flash('此游戏被使用，不能被删除') -> warning() -> important();
        return redirect() -> route('games.index') -> with('message' , 'Game delete successful!');
    }
}
