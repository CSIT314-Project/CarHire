<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ref_status', function (Blueprint $table) {
            $table->increments('id')->increments();
            $table->string('status');     
        });

        DB::table('ref_status')->insert([
            ['status' => 'available'],
            ['status' => 'unavailable']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('ref_status');
    }
}
