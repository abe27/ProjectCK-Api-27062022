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
        // 'N' = None,
        // 'J' = JobList,
        // 'P' = Set Pallet,
        // 'D' = Set Part Pallet,Dimension
        // 'C' = Set Container,
        // 'L' = Loading,
        // 'S' = Success,
        // 'H' = Holding
        Schema::create('invoices', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('order_id', 36);
            $table->string('inv_prefix', 2);
            $table->integer('running_seq');
            $table->date('ship_date');
            $table->char('ship_from_id', 36)->nullable();
            $table->string('ship_via')->nullable()->default('-');
            $table->string('ship_der')->nullable()->default('-');
            $table->char('title_id', 36)->nullable();
            $table->char('loading_area_id', 36)->nullable();
            $table->string('privilege');
            $table->string('zone_code', 10);
            $table->enum('invoice_status', ['N','J','P','D', 'C','L','S','H'])->nullable()->default('N');
            $table->string('references_id', 25);
            $table->enum('resend_gedi', ['-', 'R'])->nullable()->default('-');
            $table->boolean('is_completed')->nullable()->default(false);
            $table->boolean('is_wait_send')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreign('ship_from_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('title_id')->references('id')->on('invoice_titles')->nullOnDelete();
            $table->foreign('loading_area_id')->references('id')->on('invoice_loadings')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
