<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('lessee_profile_id');
            $table->text('contract_terms')->nullable();
            $table->date('lease_term_start_date')->nullable();
            $table->date('lease_term_end_date')->nullable();
            $table->decimal('rental_rate', 12, 2)->nullable();
            $table->text('rental_terms')->nullable();
            $table->decimal('deposit_advance', 12, 2)->nullable();
            $table->decimal('deposit_security', 12, 2)->nullable();
            $table->decimal('deposit_damage', 12, 2)->nullable();
            $table->string('default_payment')->nullable();
            $table->date('contract_date')->nullable();
            $table->text('water_terms')->nullable();
            $table->text('electric_terms')->nullable();
            $table->text('internet_terms')->nullable();
            $table->decimal('internet_rate', 12, 2)->nullable();
            $table->decimal('water_rate', 12, 2)->nullable();
            $table->decimal('electric_rate', 12, 2)->nullable();
            $table->text('condition_of_premises')->nullable();
            $table->text('expiration_lease_penalty')->nullable();
            $table->decimal('judicial_relief_rate', 12, 2)->nullable();
            $table->string('witness_name_1')->nullable();
            $table->string('witness_name_2')->nullable();
            $table->string('lessor_document')->nullable();
            $table->string('lessee_document')->nullable();
            $table->string('lessor_id_photo')->nullable();
            $table->string('lessor_id_type')->nullable();
            $table->string('lessor_id_number')->nullable();
            $table->date('lessor_id_issued_date')->nullable();
            $table->string('lessee_id_photo')->nullable();
            $table->string('lessee_id_type')->nullable();
            $table->string('lessee_id_number')->nullable();
            $table->date('lessee_id_issued_date')->nullable();
            $table->text('tax_terms')->nullable();
            $table->decimal('tax_rate', 12, 2)->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('lessee_profile_id')->references('id')->on('lessee_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
