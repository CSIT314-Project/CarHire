<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Form;
use App\Cars;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->getModels();

        $data['car'] = Cars::all();

        $data['firstRun'] = true;


        $data['makeForm'] = array(Form::select('make', $data['makeArray'], null, array('class' => 'form-control')));



        return view('Pages.search')->withData($data);
    }

    public function getModels()
    {
        //gets car model list from database to populate dropdown
        $modelCollection = Cars::pluck('make');
        $modelCollection = $modelCollection->sort();
        $modelCollection = $modelCollection->unique();
        $data['makeArray'] = $modelCollection->toArray();        
        $data['makeArray'] = array_prepend($data['makeArray'], 'any');

        //gets car transmission list from database to populate dropdown
        $transmissionCollection = Cars::pluck('transmission');
        $transmissionCollection = $transmissionCollection->sort();
        $transmissionCollection = $transmissionCollection->unique();
        $data['transmissionArray'] = $transmissionCollection->toArray();       
        $data['transmissionArray'] = array_prepend($data['transmissionArray'], 'any');

        return $data;
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
        $data = $this->getModels();

        $data['car'] = Cars::orderBy('make')->get();
        $data['firstRun'] = false;
        $data['makeForm'] = Form::select('make', $data['makeArray'], null, array('class' => 'form-control'));

        //sets values for later comparison
        $data['minYear'] = $request->minYear;
        $data['maxYear'] = $request->maxYear;
        $data['make'] = $data['makeArray'][$request->make];
        $data['transmission'] = $data['transmissionArray'][$request->transmission];
        $data['odometerMin'] = $request->odometerMin;
        $data['odometerMax'] = $request->odometerMax;

        return view('Pages.search')->withData($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
}
