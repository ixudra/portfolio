<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioCompanies extends Migration {

    public function up()
    {
        Schema::create('companies', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 256)->nullable()->default(null);
            $table->string('vat_nr', 32)->nullable()->default(null);
            $table->string('email', 256)->nullable()->default(null);
            $table->string('url', 256)->nullable()->default(null);
            $table->string('phone', 32)->nullable()->default(null);
            $table->string('fax', 32)->nullable()->default(null);
            $table->integer('billing_address_id')->nullable()->default(null);
            $table->integer('corporate_address_id')->nullable()->default(null);
            $table->integer('representative_id')->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('companies');
    }

}
