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
    	if (($handle = fopen ( public_path () . '/MOCK_CAR_DATA.csv', 'r' )) !== FALSE) 
    	{
    		while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
    		{
    			DB::table('cars')->insert([
    				'make' => $data [1],
    				'model' => $data [2],
    				'year' => $data [3],
    				'photo' => $data [4],
    				'transmission' => $data [5],
    				'odometer' => $data [6],
    				'owner' => $data [7],
                    'type' => $data [8],
                    'rate' => $data [9],
                    'description' => $data[10],
                    'city' => $data[11],
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
                        'id' => $data [0],
                        'licence' => $data [5],
                    ]);

                }
                elseif (rand(1,50) == 1)
                {
                    DB::table('IdentityCheckBlackList')->insert([
                        'id' => $data [0],
                        'licence' => $data [5],
                    ]);
                }

                    DB::table('users')->insert([
                        'firstName' => $data [1],
                        'lastName' => $data [2],
                        'email' => $data [3],
                        'password' => Hash::make($data [4]),
                        'licenceNum' => $data [5],
                        'phone' => $data [6],
                        'acctNum' => $data [7],
                        'bsb' => $data [8],
                        'cardNum' => $data [9],
                        'ccv' => $data [10],
                        'address' => $data [11],
                        'city' => $data [12],
                        'postCode' => $data [13],
                        'state' => $data [14],
                        'country' => $data [15],
                    ]);


            }
            fclose ( $handle );
        }

        if (($handle = fopen ( public_path () . '/MOCK_MESSAGES_DATA.csv', 'r' )) !== FALSE) 
        {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
            {
                DB::table('messages')->insert([
                    'updated_at' => $data [1],
                    'created_at' => $data [1],
                    'to' => $data [2],
                    'from' => $data [3],
                    'message' => $data [4],
                ]);

            }
            fclose ( $handle );
        }

        if (($handle = fopen ( public_path () . '/MOCK_TRANSACTION_DATA.csv', 'r' )) !== FALSE) 
        {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
            {
                $table = DB::table('cars')->find($data[1]);
                $cost = $data [3] * $table->rate;
                $owner = $table->owner;

                DB::table('transactions')->insert([
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'carID' => $data [1],
                    'ownerID' => $owner,
                    'renteeID' => $data [2],
                    'hours' => $data [3],
                    'ownerRating' => $data [4],
                    'renteeRating' => $data [5],
                    'cost' => $cost,
                ]);

            }
            fclose ( $handle );
        }
    	//DB::table('cars')->delete();
    }
}
