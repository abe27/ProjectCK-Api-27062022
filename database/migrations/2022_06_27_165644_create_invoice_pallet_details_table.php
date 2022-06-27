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
        Schema::create('invoice_pallet_details', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('pallet_id', 36);
            $table->char('order_detail_id', 36);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('pallet_id')->references('id')->on('invoice_pallets')->cascadeOnDelete();
            $table->foreign('order_detail_id')->references('id')->on('order_details')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_pallet_details');
    }
};
