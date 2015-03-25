<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioAddresses extends Migration {

    public function up()
    {
        Schema::create('addresses', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('street_1', 256);
            $table->string('street_2', 256);
            $table->integer('number');
            $table->string('box', 16);
            $table->string('district', 128);
            $table->string('postal_code', 32);
            $table->string('city', 128);
            $table->string('country', 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('addresses');
    }

}
