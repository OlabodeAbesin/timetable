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
        Schema::create('journey_pattern_timing_links', function (Blueprint $table) {
            $table->id();
            $table->string('journey_pattern_section_id');
            $table->integer('from_sequence_number');
            $table->string('from_activity');
            $table->string('from_dynamic_destination_display');
            $table->string('from_stop_point_ref');
            $table->string('from_timing_status');
            $table->integer('to_sequence_number');
            $table->string('to_activity');
            $table->string('to_dynamic_destination_display');
            $table->string('to_stop_point_ref');
            $table->string('to_timing_status');
            $table->string('route_link_ref');
            $table->string('run_time');
            $table->timestamps();

            // Define foreign key relationship
            $table->foreign('journey_pattern_section_id')
                ->references('id')
                ->on('journey_pattern_sections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_pattern_timing_links');
    }
};
