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
        Schema::create('stop_points', function (Blueprint $table) {
            $table->id();
            $table->string('atco_code')->index();
            $table->string('common_name');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('stop_type')->nullable();
            $table->string('administrative_area_ref');
            $table->string('timing_status')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('place_id')->references('id')->on('places');
            // $table->foreign('administrative_area_ref')->references('id')->on('administrative_areas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stop_points');
    }
};
