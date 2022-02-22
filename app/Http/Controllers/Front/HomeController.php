<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Plateform;
use App\Repositories\Plateform\PlateformRepositoryContract;
use App\Repositories\Game\GameRepositoryContract;

class HomeController extends Controller
{
    /**
     * 数据库交互类
     *
     * @var PlateformRepositoryContract
     */
    protected $plateforms;

    /**
     * 数据库交互类
     *
     * @var GameRepositoryContract
     */
    protected $games;

    /**
     * construct function
     *
     * @param PlateformRepositoryContract $plateforms
     */
    public function __construct(PlateformRepositoryContract $plateforms , GameRepositoryContract $games)
    {
        $this -> plateforms = $plateforms;
        $this -> games = $games;
    }

    public function index()
    {
        $plateforms = $this -> plateforms -> all();
        return view('index.index' , ['plateforms' => $plateforms]);
    }

    public function game($plateform)
    {
        $plateform = Plateform::where('name' , $plateform) -> first();
        $Plateforms = Plateform::all();
        return view('index.game' , ['plateform' => $plateform , 'Plateforms' => $Plateforms]);
    }

    public function show($id)
    {
        $game = $this -> games -> find($id);
        return view('index.games.show' , ['game' => $game]);
    }
}
