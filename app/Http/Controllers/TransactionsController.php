<?php

namespace App\Http\Controllers;

use Auth;
use App\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transactions;
class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(Auth::check())
            {

                $data[0]=DB::table('transactions')
                ->where('renteeID', '=', Auth::user()->id)
                ->get();


                $data[1]=DB::table('transactions')
                ->where('ownerID', '=', Auth::user()->id)
                ->get();

                return view('transactions.index')->withData($data);
            }
            else 
            {
                return view('auth.login');
            }


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
        $car = Cars::find($request->carID);

        switch ($request->day)
        {
            case 'mon':
            $car->mon = 0;
            break;
            case 'tue':
            $car->tue = 0;
            break;
            case 'wed':
            $car->wed = 0;
            break;
            case 'thu':
            $car->thu = 0;
            break;
            case 'fri':
            $car->fri = 0;
            break;
            case 'sat':
            $car->sat = 0;
            break;
            case 'sun':
            $car->sun = 0;
            break;
        }

        $car->save();
        $transaction = new Transactions;
        $transaction->carID = $request->carID;
        $transaction->ownerID = $request->ownerID;
        $transaction->renteeID = Auth::id();
        $transaction->hours = $request->hours;
        $rate = DB::table('cars')->where('id', $request->carID)->value('rate');
        $transaction->cost = $request->hours * $rate;

        $transaction->save();

        return redirect()->route('transactions.index');

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
        $transaction = Transactions::find($id);
        if($request->renteeRating!=null)
            $transaction->renteeRating = $request->renteeRating;
        if($request->ownerRating!=null)
            $transaction->ownerRating = $request->ownerRating;

        $transaction->save();

        return redirect()->route('transactions.index');

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
