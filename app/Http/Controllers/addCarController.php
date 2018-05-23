<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
      if(Auth::guest())
       return view('auth.login');

       $data = Cars::where('owner',Auth::id())->get();

       $data->cities=$this->getCities();

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

    public function getCities()
    {
      $cities=array (
        0 => 'Sydney (Capital)',
        1 => 'Albury (NSW-Victoria border)',
        2 => 'Armidale',
        3 => 'Bathurst',
        4 => 'Broken Hill',
        5 => 'Cessnock',
        6 => 'Coffs Harbour',
        7 => 'Dubbo',
        8 => 'Gosford',
        9 => 'Goulburn',
        10 => 'Grafton',
        11 => 'Griffith',
        12 => 'Lake Macquarie',
        13 => 'Lismore',
        14 => 'Maitland',
        15 => 'Newcastle',
        16 => 'Nowra',
        17 => 'Orange',
        18 => 'Port Macquarie',
        19 => 'Queanbeyan (adjacent to Canberra)',
        20 => 'Tamworth',
        21 => 'Tweed Heads (NSW-Queensland border)',
        22 => 'Wagga Wagga',
        23 => 'Wollongong',
        24 => 'Wyong',
        26 => 'Darwin (Capital)',
        27 => 'Alice Springs',
        28 => 'Katherine',
        29 => 'Palmerston',
        31 => 'Brisbane (Capital)',
        32 => 'Bundaberg',
        33 => 'Cairns',
        34 => 'Charters Towers',
        35 => 'Gladstone',
        36 => 'Gold Coast',
        37 => 'Gympie',
        38 => 'Hervey Bay',
        39 => 'Ipswich',
        40 => 'Logan City',
        41 => 'Mackay',
        42 => 'Maryborough',
        43 => 'Mount Isa',
        44 => 'Nambour',
        45 => 'Redcliffe',
        46 => 'Rockhampton',
        47 => 'Sunshine Coast {region}',
        48 => 'Thuringowa',
        49 => 'Toowoomba',
        50 => 'Townsville',
        52 => 'Adelaide (Capital)',
        53 => 'Gladstone',
        54 => 'Mount Gambier',
        55 => 'Murray Bridge',
        56 => 'Port Augusta',
        57 => 'Port Pirie',
        58 => 'Port Lincoln',
        59 => 'Victor Harbor',
        60 => 'Whyalla',
        62 => 'Hobart (Capital)',
        63 => 'Burnie',
        64 => 'Clarence',
        65 => 'Devonport',
        66 => 'Glenorchy',
        67 => 'Launceston',
        69 => 'Melbourne (Capital)',
        70 => 'Benalla',
        71 => 'Ballarat',
        72 => 'Bendigo',
        73 => 'Geelong',
        74 => 'Latrobe City',
        75 => 'Mildura',
        76 => 'Shepparton',
        77 => 'Swan Hill',
        78 => 'Wangaratta',
        79 => 'Warrnambool',
        80 => 'Wodonga',
        82 => 'Perth (Capital)',
        83 => 'Albany',
        84 => 'Broome',
        85 => 'Bunbury',
        86 => 'Geraldton',
        87 => 'Fremantle',
        88 => 'Kalgoorlie',
        89 => 'Mandurah',
        90 => 'Port Hedland',
        90 => 'Abbotsfield',
      );
      sort($cities);
      return $cities;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data 
      $this->validate($request, array(
        'make' => 'required|max:255',
        'model' => 'required|max:255',
        'year' => 'required',
        'odometer' => 'required',
        'transmission' => 'required',
        'carType' => 'required',
        'rego' => 'required'
      ));

      $blacklist = DB::table('rego_black_lists')->get();

      $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
      fwrite($myfile, 'Start');

      foreach ($blacklist as $list) 
      {
                  fwrite($myfile, '|list ' . $list->rego . ' request ' . $request->rego);

        if($list->rego === $request->rego)
        {
          return redirect('garage')->with('status', 'Unfortunately this car has failed a registration check.');
        }
      }

      fclose($myfile);
      $city = $this->getCities();
      $city = $city[$request->city];
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
          'owner' => Auth::user()->id,
          'photo'=> $photoName,
          'rate' => $request->rate,
          'description' => $request->description,
          'mon'=> $request->mon,
          'tue'=> $request->tue,
          'wed'=> $request->wed,
          'thu'=> $request->thu,
          'fri'=> $request->fri,
          'sat'=> $request->sat,
          'sun'=> $request->sun,
          'city' => $city,
        ];
        if ($request->mon != '1')
        {
          $data['mon']='0';
        }
        if ($request->tue != '1')
        {
          $data['tue']='0';
        }
        if ($request->wed != '1')
        {
          $data['wed']='0';
        }
        if ($request->thu != '1')
        {
          $data['thu']='0';
        }
        if ($request->fri != '1')
        {
          $data['fri']='0';
        }
        if ($request->sat != '1')
        {
          $data['sat']='0';
        }
        if ($request->sun != '1')
        {
          $data['sun']='0';
        }
        $cars->create($data); 

        return redirect()->route('garage.index');
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
      $data = Cars::find($id);

      $data->mon = '1';
      $data->tue = '1';
      $data->wed = '1';
      $data->thu = '1';
      $data->fri = '1';
      $data->sat = '1';
      $data->sun = '1';
      if ($request->mon != '1')
      {
        $data->mon='0';
      }
      if ($request->tue != '1')
      {
        $data->tue='0';
      }
      if ($request->wed != '1')
      {
        $data->wed='0';
      }
      if ($request->thu != '1')
      {
        $data->thu='0';
      }
      if ($request->fri != '1')
      {
        $data->fri='0';
      }
      if ($request->sat != '1')
      {
        $data->sat='0';
      }
      if ($request->sun != '1')
      {
        $data->sun='0';
      }

      $data->save();
      return redirect()->route('garage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cars = Cars::find($id);

      $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
      $txt = public_path('images') . '/' . $cars->photo;
      fwrite($myfile, $txt);
      fclose($myfile);

      Storage::delete(public_path('images') . '/' . $cars->photo);

      Cars::destroy($id);

      return redirect()->route('garage.index');
    }
  }
