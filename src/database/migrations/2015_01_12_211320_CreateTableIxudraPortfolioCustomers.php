<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioCustomers extends Migration {

    public function up()
    {
        Schema::create('customers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 128)->nullable()->default(null);
            $table->string('customer_type', 64)->nullable()->default(null);
            $table->integer('customer_id')->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('customers');
    }

}
