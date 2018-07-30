<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('special_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer_id')->unique();
            $table->string('offer_name');
            $table->decimal('discount', 5, 2);
            $table->dateTime('date_created');
        });
        // Inserting default discounts in db
         DB::table('special_offer')->insert(
                     array(
                         ['offer_id' => time().'1',
                         'offer_name' => "20% discount For Shoe Purchase",
                         'discount' => 0.2,
                         'date_created' => date("Y-m-d h:m:i")
                         ],
                         ['offer_id' => time().'2',
                         'offer_name' => "10% discount For Television Purchase",
                         'discount' => 0.1,
                         'date_created' => date("Y-m-d h:m:i")
                         ]
                     ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_offer');
    }
}
