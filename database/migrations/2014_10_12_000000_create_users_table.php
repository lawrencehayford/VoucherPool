<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipient_id')->unique();;
            $table->string('name');
            $table->string('email')->unique();
            $table->dateTime('date_created');
        });

        DB::table('recipient')->insert(
                    array(
                        ['recipient_id' => time().'1',
                        'name' => "Lawrence Casely-Hayford",
                        'email' => "lawrencecaselyhayford@gmail.com",
                        'date_created' => date("Y-m-d h:m:i")
                        ],
                        ['recipient_id' => time().'2',
                        'name' => "Nana Kwame Asante",
                        'email' => "kwame@gmail.com",
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
        Schema::dropIfExists('recipient');
    }
}
