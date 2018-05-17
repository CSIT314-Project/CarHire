<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Messages;
use App\Cars;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Pages.settings');
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

        Messages::where('from', Auth::id())->delete();
        Messages::where('to', Auth::id())->delete();

        $cars = Cars::where('owner', Auth::id())->get();

        foreach($cars as $photo)
        {

            Storage::delete(public_path('images') . $photo->photo);

        }

        Cars::where('owner',Auth::id())->delete();

        User::destroy(Auth::id());
        Auth::logout();
        return view('Pages.dashboard');


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
        $users = User::find($id);
        
        if($request->email!=NULL)
           $users->email = $request->email;

       if($request->licenceNum!=NULL)
           $users->licenceNum = $request->licenceNum;

       if($request->phone!=NULL)
           $users->phone = $request->phone;

       if($request->bsb!=NULL)
           $users->bsb = $request->bsb;

       if($request->acctNum!=NULL)
           $users->acctNum = $request->acctNum;

       if($request->ccv!=NULL)
           $users->ccv = $request->ccv;

       if($request->address!=NULL)
           $users->address = $request->address;

       if($request->city!=NULL)
           $users->city = $request->city;

       if($request->postcode!=NULL)
           $users->postcode = $request->postcode;

       if($request->state!=NULL)
           $users->state = $request->state;

       if($request->country!=NULL)
           $users->country = $request->country;

       if($request->cardNum!=NULL)
           $users->cardNum = $request->cardNum;

       $users->save();

       return redirect()->route('settings.index');

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
