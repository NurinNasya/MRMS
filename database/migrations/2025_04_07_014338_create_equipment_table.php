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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('device_id')->unique();
            $table->string('device_name');
            $table->integer('quantity');
            $table->string('room');
            $table->enum('status', ['Available', 'Maintenance', 'In Use']);
            $table->date('last_maintenance');
            $table->date('next_maintenance');
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
