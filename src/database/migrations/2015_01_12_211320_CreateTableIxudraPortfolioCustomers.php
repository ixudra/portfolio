<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioCustomers extends Migration {

    public function up()
    {
        Schema::create('customers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email', 128);
            $table->string('cellphone', 16);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('customers');
    }

}
