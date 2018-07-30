<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('voucher_codes', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('voucher_id')->unique();
          $table->string('voucher_code')->unique();
          $table->string('special_offer_id');
          $table->dateTime('date_created');
          $table->dateTime('expiring_date');
          $table->string('used_by_recipient_id')->nullable();
          $table->dateTime('date_used')->nullable();
          $table->integer('usage_try')->nullable();

      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('voucher_codes');
    }
}
