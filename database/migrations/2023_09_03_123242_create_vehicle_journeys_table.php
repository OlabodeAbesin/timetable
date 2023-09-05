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
        Schema::create('vehicle_journeys', function (Blueprint $table) {
            $table->id();
            $table->string('private_code');
            $table->string('block_description')->nullable();
            $table->string('block_number')->nullable();
            $table->string('ticket_machine_service_code');
            $table->string('journey_code');
            $table->string('regular_day_type')->nullable();
            $table->string('bank_holiday_operation')->nullable();
            $table->string('layover_point_name')->nullable();
            $table->string('layover_point_longitude')->nullable();
            $table->string('layover_point_latitude')->nullable();
            $table->string('garage_code');
            $table->string('service_code');
            $table->string('line_code');
            $table->string('journey_pattern_ref');
            $table->time('departure_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_journeys');
    }
};
