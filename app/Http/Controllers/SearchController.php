<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data['car'] = Cars::all();;

        $data['minYear'] = 1990;
        $data['maxYear'] = 2019;
        $data['make'] = 'none';

        $modelCollection = Cars::pluck('make');
        $modelCollection = $modelCollection->sort();
        $modelCollection = $modelCollection->unique();

        $data['makeArray'] = $modelCollection->toArray();        
        $data['makeArray'] = array_prepend($data['makeArray'], 'none');


        return view('Pages.search')->withData($data);
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
        $data['car'] = Cars::all();;
        

        $data['minYear'] = $request->minYear;
        $data['maxYear'] = $request->maxYear;
        $data['make'] = $request->make;

        
        $modelCollection = Cars::pluck('make');
        $modelCollection = $modelCollection->sort();
        $modelCollection = $modelCollection->unique();

        $data['makeArray'] = $modelCollection->toArray();        
        $data['makeArray'] = array_prepend($data['makeArray'], 'none');

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
