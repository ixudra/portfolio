<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioProjects extends Migration {

    public function up()
    {
        Schema::create('projects', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 64);
            $table->integer('contractor_id');
            $table->integer('customer_id');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', array('unknown', 'open', 'scheduled', 'in_development', 'completed', 'cancelled'));
            $table->integer('project_type_id');
            $table->boolean('hidden');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('projects');
    }

}
