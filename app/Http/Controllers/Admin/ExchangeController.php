<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Exchange\Create;
use App\Http\Requests\Exchange\Update;
use App\Repositories\Exchange\ExchangeRepositoryContract;

class ExchangeController extends Controller
{
    /**
     * 数据库交互类
     *
     * @var [ExchangeRepository]
     */
    protected $exchanges;
    
    /**
     * 构造函数，执行依赖注入
     *
     * @param ExchangeRepositoryContract $exchanges
     */
    public function __construct(
        ExchangeRepositoryContract $exchanges
    ) 
    {
        $this -> exchanges = $exchanges;
        // $this -> middleware(['permission:外汇' , 'auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = $this -> exchanges -> all();
        return view('manage.exchanges.index' , ['exchanges' => $exchanges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.exchanges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $exchanges = $this -> exchanges -> store($request -> all());
        return redirect() -> route('exchanges.index') -> with('message' , 'Create exchange successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exchange = $this -> exchanges -> find($id);
        return view('manage.exchanges.show' , ['exchange' => $exchange]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exchange = $this -> exchanges -> find($id);
        return view('manage.exchanges.edit' , ['exchange' => $exchange]);
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
        $this -> exchanges -> update($request -> all() , $id);
        return redirect() -> route('exchanges.index') -> with('message' , 'Update exchange successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> exchanges -> destroy($id);
        return redirect() -> route('exchanges.index') -> with('message' , 'Delete exchange successful!');
    }
}
