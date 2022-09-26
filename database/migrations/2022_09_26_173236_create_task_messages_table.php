<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_messages', function (Blueprint $table) {
                $table->id('message_id');
                $table->text('MessageBody');
                $table->string('senderName')->default('Admin');
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
        Schema::dropIfExists('task_messages');
    }
}
