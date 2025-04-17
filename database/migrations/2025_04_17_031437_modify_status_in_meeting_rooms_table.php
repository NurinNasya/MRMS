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
        Schema::table('meeting_rooms', function (Blueprint $table) {
            // Modify the 'status' column to include 'Pending'
            $table->enum('status', ['Available', 'Booked', 'In Use', 'Pending'])->default('Available')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meeting_rooms', function (Blueprint $table) {
            // Rollback the 'status' column to its original state (without 'Pending')
            $table->enum('status', ['Available', 'Booked', 'In Use'])->default('Available')->change();
        });
    }
};

