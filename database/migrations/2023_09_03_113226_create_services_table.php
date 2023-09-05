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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_code');
            $table->string('private_code');
            $table->date('start_date');
            $table->date('end_date');
            $table->json('operating_profile')->nullable();
            $table->string('registered_operator_ref');
            $table->string('regular_day_type')->nullable();
            $table->json('stop_requirements')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            //Todo: Come back to check this
            // $table->foreign('registered_operator_ref')->references('national_operator_code')->on('operators');
            // $table->foreign('standard_service_id')->references('id')->on('standard_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
