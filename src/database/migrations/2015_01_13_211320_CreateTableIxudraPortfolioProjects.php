<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIxudraPortfolioProjects extends Migration {

    public function up()
    {
        Schema::create('projects', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 64)->nullable()->default(null);
            $table->integer('contractor_id')->nullable()->default(null);
            $table->integer('customer_id')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->date('start_date')->nullable()->default(null);
            $table->date('end_date')->nullable()->default(null);
            $table->enum('status', array('unknown', 'open', 'scheduled', 'in_development', 'completed', 'cancelled'));
            $table->integer('project_type_id')->nullable()->default(null);
            $table->boolean('hidden')->nullable()->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('projects');
    }

}
