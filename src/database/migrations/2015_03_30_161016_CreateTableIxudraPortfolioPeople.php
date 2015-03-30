<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioPeople extends Migration {

    public function up()
    {
        Schema::create('people', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 256);
            $table->string('last_name', 256);
            $table->string('email', 256);
            $table->date('birth_date');
            $table->string('cellphone', 32);
            $table->string('address_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('people');
    }

}
