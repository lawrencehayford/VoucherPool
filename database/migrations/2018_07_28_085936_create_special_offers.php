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
            $table->string('Name');
            $table->decimal('discount', 5, 2);
            $table->dateTime('date_created');
        });
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
