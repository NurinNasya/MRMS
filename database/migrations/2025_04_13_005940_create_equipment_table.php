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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            // Add foreign key to the meeting_rooms table
            $table->foreignId('meeting_room_id')  // Foreign key for meeting_rooms
                ->constrained('meeting_rooms')  // Reference meeting_rooms table
                ->onDelete('cascade');  // Optional: Set cascading delete if the meeting room is deleted
            $table->string('equipment_name');
            $table->integer('quantity');
            $table->enum('status', ['Available', 'Maintenance', 'In Use'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
