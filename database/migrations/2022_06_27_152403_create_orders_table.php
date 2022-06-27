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
        Schema::create('orders', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('order_zone_type_id', 36)->nullable();
            $table->char('corrective_id', 36)->nullable();
            $table->char('commercial_id', 36)->nullable();
            $table->char('consignee_id', 36);
            $table->char('shipping_id', 36)->nullable();
            $table->char('order_type_id', 36)->nullable();
            $table->date('etd_date');
            $table->string('order_group');
            $table->boolean('is_matched')->nullable()->default(false);
            $table->boolean('is_checked')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('order_zone_type_id')->references('id')->on('order_zone_types')->nullOnDelete();
            $table->foreign('corrective_id')->references('id')->on('correctives')->nullOnDelete();
            $table->foreign('commercial_id')->references('id')->on('commercials')->nullOnDelete();
            $table->foreign('consignee_id')->references('id')->on('consignees')->cascadeOnDelete();
            $table->foreign('shipping_id')->references('id')->on('shipping_types')->nullOnDelete();
            $table->foreign('order_type_id')->references('id')->on('order_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
