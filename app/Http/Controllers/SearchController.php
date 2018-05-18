<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $data['car'] = DB::table('cars')->orderBy('make')->get();

        $data['makeForm'] = Form::select('make', $data['makeArray'], null, array('class' => 'form-control'));



        return view('Pages.search')->withData($data);
    }

    public function getModels()
    {
        $data['orderArray'] = array('Sort by Make Ascending','Sort by Make Descending','Sort by Year Ascending', 'Sort by Year Descending', 'Sort by Odometer Ascending', 'Sort by Odometer Descending', 'Sort by Rate Ascending', 'Sort by Rate Descending', 'Sort by City Ascending', 'Sort by City Descending');

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

        $cityCollection = Cars::pluck('city');
        $cityCollection = $cityCollection->sort();
        $cityCollection = $cityCollection->unique();
        $data['cityArray'] = $cityCollection->toArray();       
        $data['cityArray'] = array_prepend($data['cityArray'], 'any');


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
        $sortColumn = 'make';
        $sortDirection = 'Asc';

        switch($request->order)
        {
            case 0: $sortColumn = 'make';
            $sortDirection = 'asc';
            break;
            case 1: $sortColumn = 'make';
            $sortDirection = 'desc';
            break;
            case 2: $sortColumn = 'year';
            $sortDirection = 'asc';
            break;
            case 3: $sortColumn = 'year';
            $sortDirection = 'desc';
            break;
            case 4: $sortColumn = 'odometer';
            $sortDirection = 'asc';
            break;
            case 5: $sortColumn = 'odometer';
            $sortDirection = 'desc';
            break;
            case 6: $sortColumn = 'rate';
            $sortDirection = 'asc';
            break;
            case 7: $sortColumn = 'rate';
            $sortDirection = 'desc';
            break;
            case 8: $sortColumn = 'city';
            $sortDirection = 'asc';
            break;
            case 9: $sortColumn = 'city';
            $sortDirection = 'desc';
            break;

        }

        $data = $this->getModels();
        $makeOperator = '=';
        $transmissionOperator = '=';
        $cityOperator = '=';

        if ($request->odometerMax == 'any')
        {
            $request->odometerMax = '99999999';
        }
        if ($data['makeArray'][$request->make] == 'any')
        {
            $makeOperator = '<>';
        }
        if ($data['transmissionArray'][$request->transmission] == 'any')
        {
            $transmissionOperator = '<>';
        }
        if ($data['cityArray'][$request->city] == 'any')
        {
            $cityOperator = '<>';
        }

        $data['car'] = DB::table('cars')
        ->where([
            ['year', '>=', $request->minYear],
            ['year', '<=', $request->maxYear],
            ['odometer', '>=', $request->odometerMin],
            ['odometer', '<=', $request->odometerMax],
            ['rate', '>=', $request->rateMin],
            ['rate', '<=', $request->rateMax],
            ['make', $makeOperator, $data['makeArray'][$request->make]],
            ['transmission', $transmissionOperator, $data['transmissionArray'][$request->transmission]],
            ['city', $cityOperator, $data['cityArray'][$request->city]],
        ])
        ->orderBy($sortColumn, $sortDirection)
        ->get();

        $data['makeForm'] = Form::select('make', $data['makeArray'], null, array('class' => 'form-control', 'onchange' => 'submit(this)'));


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
