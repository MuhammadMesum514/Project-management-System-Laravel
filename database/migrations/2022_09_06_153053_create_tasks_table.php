<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('TaskName');
            $table->unsignedBigInteger('ProjectID');            
            $table->unsignedBigInteger('AssignedTo');            
            $table->unsignedBigInteger('AssignedBy');            
            $table->foreign('ProjectID')->references('project_id')->on('projects')->onDelete('cascade');
            $table->foreign('AssignedTo')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('AssignedBy')->references('manager_id')->on('managers')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
