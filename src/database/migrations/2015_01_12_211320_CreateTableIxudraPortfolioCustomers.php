<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioCustomers extends Migration {

    public function up()
    {
        Schema::create('customers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('customer_type', 64);
            $table->integer('customer_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('customers');
    }

}
