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
        Schema::create('journey_pattern_sections', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            // $table->unsignedBigInteger('route_id');
            // $table->unsignedBigInteger('service_id');
            // $table->foreign('route_id')->references('id')->on('routes');
            // $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_pattern_sections');
    }
};