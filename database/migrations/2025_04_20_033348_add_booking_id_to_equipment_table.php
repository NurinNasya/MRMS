<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id')->nullable(); // Add booking_id column
    
            // Optionally, you can add a foreign key constraint (if you want to ensure integrity)
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropForeign(['booking_id']); // Drop foreign key constraint
            $table->dropColumn('booking_id'); // Drop booking_id column
        });
    }
    
};
