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
        Schema::create('order_details', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('order_id', 36);
            $table->char('order_plan_id', 36);
            $table->char('revise_id', 36)->nullable();
            $table->char('ledger_id', 36)->nullable();
            $table->string('pono', 25);
            $table->string('lotno', 25)->nullable()->default('-');
            $table->date('order_month');
            $table->decimal('order_orgi');
            $table->decimal('order_round');
            $table->decimal('order_balqty');
            $table->decimal('order_stdpack');
            $table->string('shipped_flg');
            $table->decimal('shipped_qty');
            $table->string('sam_flg', 1);
            $table->string('carrier_code', 10);
            $table->string('bidrfl', 1);
            $table->string('delete_flg', 1);
            $table->string('reason_code', 5)->nullable()->default('-');
            $table->string('firm_flg');
            $table->string('poupd_flg');
            $table->integer('set_pallet_ctn')->nullable()->default(0);
            $table->integer('revise_ctn')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreign('order_plan_id')->references('id')->on('order_plans')->cascadeOnDelete();
            $table->foreign('revise_id')->references('id')->on('revise_types')->nullOnDelete();
            $table->foreign('ledger_id')->references('id')->on('ledgers')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
