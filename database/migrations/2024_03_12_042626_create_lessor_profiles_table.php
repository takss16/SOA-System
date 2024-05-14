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
        Schema::create('lessor_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_user_id');
            $table->foreign('creator_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('spouse')->nullable();
            $table->string('suffix')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_tel')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('bir_name')->nullable();
            $table->date('bir_registration_date')->nullable();
            $table->string('tax_type')->nullable();
            $table->string('trade_name')->nullable();
            $table->string('line_of_business')->nullable();
            $table->string('building_number')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('id_photo')->nullable();
            $table->json('attached_documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessor_profiles');
    }
};
