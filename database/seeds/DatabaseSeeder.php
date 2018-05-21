<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Cars;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('CreditCheckBlackList')->insert([
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'licence' => 99999,
        ]);
        DB::table('IdentityCheckBlackList')->insert([
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'licence' => 88888,
        ]);
        
        if (($handle = fopen ( public_path () . '/MOCK_CAR_DATA.csv', 'r' )) !== FALSE) 
        {
          while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
          {
           DB::table('cars')->insert([
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'make' => $data [0],
            'model' => $data [1],
            'year' => $data [2],
            'photo' => rand(1,15) . '.jpg',
            'transmission' => $data [3],
            'odometer' => $data [4],
            'owner' => $data [5],
            'type' => $data [6],
            'rate' => $data [7],
            'description' => $data[8],
            'city' => $data[9],
            'mon' => rand(0,1),
            'tue' => rand(0,1),
            'wed' => rand(0,1),
            'thu' => rand(0,1),
            'fri' => rand(0,1),
            'sat' => rand(0,1),
            'sun' => rand(0,1),
        ]);

       }
       fclose ( $handle );
   }

   if (($handle = fopen ( public_path () . '/MOCK_USER_DATA.csv', 'r' )) !== FALSE) 
   {
      while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
      {
        if (rand(1,50) == 1)
        {
            DB::table('CreditCheckBlackList')->insert([
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'id' => $data [15],
                'licence' => $data [4],
            ]);

        }
        if (rand(1,50) == 1)
        {
            DB::table('IdentityCheckBlackList')->insert([
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'id' => $data [15],
                'licence' => $data [4],
            ]);
        }

        DB::table('users')->insert([
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'firstName' => $data [0],
            'lastName' => $data [1],
            'email' => $data [2],
            'password' => Hash::make($data [3]),
            'licenceNum' => $data [4],
            'phone' => $data [5],
            'acctNum' => $data [6],
            'bsb' => $data [7],
            'cardNum' => $data [8],
            'ccv' => $data [9],
            'address' => $data [10],
            'city' => $data [11],
            'postCode' => $data [12],
            'state' => $data [13],
            'country' => $data [14],
        ]);


    }
    fclose ( $handle );
}

if (($handle = fopen ( public_path () . '/MOCK_MESSAGES_DATA.csv', 'r' )) !== FALSE) 
{
    while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
    {
        DB::table('messages')->insert([
            'updated_at' => $data [0],
            'created_at' => $data [0],
            'to' => $data [1],
            'from' => $data [2],
            'message' => $data [3],
        ]);

    }
    fclose ( $handle );
}

if (($handle = fopen ( public_path () . '/MOCK_TRANSACTION_DATA.csv', 'r' )) !== FALSE) 
{
    while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
    {
        $table = DB::table('cars')->find($data[0]);
        $cost = $data [2] * $table->rate;
        $owner = $table->owner;

        DB::table('transactions')->insert([
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'carID' => $data [0],
            'ownerID' => $owner,
            'renteeID' => $data [1],
            'hours' => $data [2],
            'ownerRating' => $data [3],
            'renteeRating' => $data [4],
            'cost' => $cost,
        ]);

    }
    fclose ( $handle );
}
    	//DB::table('cars')->delete();
}
}
