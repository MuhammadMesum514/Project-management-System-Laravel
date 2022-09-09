<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTaskDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_details', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_completed')->default(0);
            $table->string('status')->default('New');
            $table->integer('Completion_percent')->unsigned()->default(0);
            $table->unsignedBigInteger('TaskID');            
            $table->foreign('TaskID')->references('task_id')->on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('user_task_details');
    }
}
