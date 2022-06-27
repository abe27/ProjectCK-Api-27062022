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
        Schema::create('container_details', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('pallet_id', 36);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('pallet_id')->references('id')->on('invoice_pallets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('container_details');
    }
};
