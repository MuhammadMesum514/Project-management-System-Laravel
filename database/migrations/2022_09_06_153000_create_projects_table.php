<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('ProjectName');
            $table->date('start');
            $table->date('End');
            $table->text('ProjectDescription');
            $table->Boolean('is_completed')->default(0);
            $table->string('status')->default('New');
            $table->integer('progress')->default(0);
            $table->unsignedBigInteger('TeamID');            
            $table->foreign('TeamID')->references('team_id')->on('teams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
