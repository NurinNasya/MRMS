<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('meeting_rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->integer('capacity')->nullable();
            $table->string('room_name')->nullable();
            $table->string('status')->default('Available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_rooms');
    }
}