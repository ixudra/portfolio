<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioPeople extends Migration {

    public function up()
    {
        Schema::create('people', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 256)->nullable()->default(null);
            $table->string('last_name', 256)->nullable()->default(null);
            $table->string('email', 256)->nullable()->default(null);
            $table->date('birth_date')->nullable()->default(null);
            $table->string('cellphone', 32)->nullable()->default(null);
            $table->integer('address_id')->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('people');
    }

}
