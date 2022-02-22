<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Plateform\Create;
use App\Http\Requests\Plateform\Update;
use App\Repositories\Plateform\PlateformRepositoryContract;

class PlateformController extends Controller
{
     /**
     * 数据库交互类
     *
     * @var PlateformRepositoryContract
     */
    protected $plateforms;

    /**
     * construct function
     *
     * @param PlateformRepositoryContract $plateforms
     */
    public function __construct(PlateformRepositoryContract $plateforms)
    {
        $this -> plateforms = $plateforms;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plateforms = $this -> plateforms -> all();
        return view('manage.plateforms.index' , ['plateforms' => $plateforms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.plateforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $create)
    {
        $this -> plateforms -> store($create -> all());
        return redirect() -> route('plateforms.index') -> with('message' , 'Create plateform successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plateform = $this -> plateforms -> find($id);
        return view('manage.plateforms.show' , ['plateform' => $plateform]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plateform = $this -> plateforms -> find($id);
        return view('manage.plateforms.edit' , ['plateform' => $plateform]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $update, $id)
    {
        $this -> plateforms -> update($update -> all() , $id);
        return redirect() -> route('plateforms.index') -> with('message' , 'Update plateform successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> plateforms -> destroy($id);        
        return redirect() -> route('plateforms.index') -> with('message' , 'Delete plateform successful!');
    }
}
