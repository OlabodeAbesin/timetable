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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('national_operator_code')->index();
            $table->string('operator_id');
            $table->string('operator_code');
            $table->string('operator_short_name');
            $table->string('operator_name_on_licence');
            $table->string('trading_name')->nullable();
            $table->string('licence_number');
            $table->string('licence_classification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
