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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number')->default('UNKNOWN'); // Set a default value
            $table->string('departure_airport');
            $table->string('destination_airport');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time')->default(now()); // Set a default value for arrival_time
            $table->unsignedInteger('available_seats');
            $table->decimal('ticket_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
