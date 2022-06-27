<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pallets', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('invoice_id', 36);
            $table->char('pallet_type_id', 36)->nullable();
            $table->char('pallet_placing_id', 36)->nullable();
            $table->integer('pallet_no');
            $table->string('pallet_out_no')->nullable()->default('-');
            $table->integer('pallet_total_ctn')->nullable()->default(0);
            $table->integer('pallet_limit_ctn')->nullable()->default(20);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
            $table->foreign('pallet_type_id')->references('id')->on('pallet_types')->nullOnDelete();
            $table->foreign('pallet_placing_id')->references('id')->on('pallet_placing_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_pallets');
    }
};
