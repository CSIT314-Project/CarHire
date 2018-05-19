<?php

namespace App\Http\Controllers;

use Auth;
use App\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data;
        if(Auth::check())
            {
                /*$data['messages'] = DB::table('messages')
                ->where('from', '=', Auth::user()->id)
                ->orWhere('to', '=', Auth::user()->id)
                ->get();*/

                $query1=  DB::table('messages')
                ->select('to')
                ->where('from', '=', Auth::user()->id);


                $data['fromID'] = DB::table('messages')
                ->select('from')
                ->orWhere('to', '=', Auth::user()->id)
                ->union($query1)
                ->get();

                $data['user'] = array();
                foreach($data['fromID'] as $id)
                {
                    $user = DB::table('users')
                    ->where('id', '=', $id->from)
                    ->first();

                    array_push($data['user'], $user);

                }

                //$data['messages'] = DB::table('messages')->

            }
            else 
            {
                return view('auth.login');
            }

            return view('messages.index')->withData($data);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data)
    {
        
    }

    public function store(Request $request)
    {
        //
        return redirect()->route('messages.show', $request->chatID);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['table'] = DB::table('messages')
        ->where([
            ['to', '=', Auth::user()->id],
            ['from', '=', $id],
        ])
        ->orWhere([
            ['from', '=', Auth::user()->id],
            ['to', '=', $id],
        ])
        ->orderBy('created_at')
        ->get();

        $fName = DB::table('users')->where('id',$id)->value('firstName');
        $lName = DB::table('users')->where('id',$id)->value('lastName');
        $data['name'] = $fName . ' ' . $lName;
        $data['fromID'] = $id;

        return view('messages.show')->withData($data);
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
        Messages::create([
            'message' => $request->sentMessage,
            'from' => Auth::user()->id,
            'to' => $id,
        ]);
        return redirect()->route('messages.show', $id);

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
