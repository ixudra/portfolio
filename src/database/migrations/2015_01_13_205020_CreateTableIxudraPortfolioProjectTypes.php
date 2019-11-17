<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioProjectTypes extends Migration {

    public function up()
    {
        Schema::create('project_types', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 64)->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('project_types');
    }

}
