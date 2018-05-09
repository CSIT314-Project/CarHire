<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    				'id' => $data [0],
    				'make' => $data [1],
    				'model' => $data [2],
    				'year' => $data [3],
    				'photo' => $data [4],
    				'transmission' => $data [5],
    				'odometer' => $data [6],
    				'owner' => $data [7],
    			]);

    		}
    		fclose ( $handle );
    	}

    	if (($handle = fopen ( public_path () . '/MOCK_USER_DATA.csv', 'r' )) !== FALSE) 
    	{
    		while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) 
    		{
    			DB::table('users')->insert([
    				'id' => $data [0],
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
                    'id' => $data [0],
                    'timestamp' => $data [1],
                    'to' => $data [2],
                    'from' => $data [3],
                    'message' => $data [4],
                ]);

            }
            fclose ( $handle );
        }
    	//DB::table('cars')->delete();
    }
}
