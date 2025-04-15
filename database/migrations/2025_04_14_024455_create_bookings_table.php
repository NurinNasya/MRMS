<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedBigInteger('user_id');
            $table->foreignId('meeting_room_id')  // Foreign key for meeting_rooms
                ->constrained('meeting_rooms')  // Reference meeting_rooms table
                ->onDelete('cascade');  // Optional: Set cascading delete if the meeting room is deleted
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('participant');
            $table->text('meeting_agenda');
            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Cancelled'])->default('Pending');
            $table->timestamps();
    
            // Optional: Add foreign key constraints
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
