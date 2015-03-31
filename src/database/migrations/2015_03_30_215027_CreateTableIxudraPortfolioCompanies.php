<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioCompanies extends Migration {

    public function up()
    {
        Schema::create('companies', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('vat_nr', 32);
            $table->string('email', 256);
            $table->string('url', 256);
            $table->string('phone', 32);
            $table->string('fax', 32);
            $table->integer('billing_address_id');
            $table->integer('corporate_address_id');
            $table->integer('representative_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('companies');
    }

}
