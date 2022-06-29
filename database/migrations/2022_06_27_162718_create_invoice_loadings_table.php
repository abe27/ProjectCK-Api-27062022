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
        Schema::create('invoice_loadings', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('whs_id', 36)->nullable();
            $table->char('factory_id', 36)->nullable();
            $table->char('shipping_id', 36)->nullable();
            $table->string('name');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('whs_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('factory_id')->references('id')->on('factories')->nullOnDelete();
            $table->foreign('shipping_id')->references('id')->on('shipping_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_loadings');
    }
};
