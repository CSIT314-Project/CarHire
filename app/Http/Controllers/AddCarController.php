<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Form;
use App\Cars;

class AddCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Cars::all();

        return view('Pages.garage')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addCar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data 
        $this->validate($request, array(
            'make' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required',
            'odometer' => 'required',
            'transmission' => 'required',
            'carType' => 'required'
        ));

        //Store in the database 
        // get current time and append the uploaded file extension
        $photoName = $request->make.'-'.$request->model.'.'.$request->carImage->getClientOriginalExtension();
        //take the selected file and move it public directory
        $request->carImage->move(public_path('images'), $photoName);

        $cars = new Cars;   //cars model --> Cars.php
        $data = [
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'odometer' => $request->odometer,
            'transmission' => $request->transmission,
            'type' => $request->carType,
            'photo'=> $photoName
        ];

        $cars->create($data); 

        //Redirect to garage page displaying data
        return view('Pages.garage')->withData($data);
    }


    //retrieve user ID for currently logged in account
    public function getUser()
    {
        return Auth::id(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Display data by id  
        //$data = Cars::find($id);
         $data['car'] = Cars::all();

        return view('Pages.garage')->withData($data);
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
