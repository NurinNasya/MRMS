<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBookingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_bookings', function (Blueprint $table) {
            
            $table->bigInteger('user_id');
            $table->bigInteger('room_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('participant');
            $table->text('agenda');
            $table->enum('status', ['Approved', 'Rejected', 'Cancelled'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bookings');
    }
}
