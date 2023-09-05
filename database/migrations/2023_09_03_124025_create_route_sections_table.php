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
        Schema::create('route_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_id');
            $table->string('route_link_id');
            $table->string('from_stop_point_ref')->index();
            $table->string('to_stop_point_ref')->index();
            $table->decimal('distance', 10, 2);
            $table->string('direction');
            $table->text('track')->nullable();

            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('from_stop_point_ref')->references('atco_code')->on('stop_points');
            // $table->foreign('to_stop_point_ref')->references('atco_code')->on('stop_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_sections');
    }
};
