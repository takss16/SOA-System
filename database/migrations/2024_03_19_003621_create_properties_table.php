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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('building_unit')->nullable();
            $table->string('lot')->nullable();
            $table->string('block')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city_town')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->text('property_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
