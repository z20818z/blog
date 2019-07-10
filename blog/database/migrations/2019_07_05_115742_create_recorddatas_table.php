<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecorddatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorddata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('username');
            $table->string('userID');
            //$table->integer('data_id');
            $table->string('dataID');
            $table->date('startTime');
            $table->integer('starthour');
            $table->date('endTime');
            $table->integer('endhour');
            $table->text('title');
            $table->text('content_2');
            $table->string('invite');
            $table->date('remind');
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
        Schema::dropIfExists('recorddata');
    }
}
