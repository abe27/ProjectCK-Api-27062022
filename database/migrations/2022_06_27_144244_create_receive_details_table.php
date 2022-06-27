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
        Schema::create('receive_details', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('receive_id', 36);
            $table->char('ledger_id', 36);
            $table->decimal('plan_qty');
            $table->decimal('plan_ctn');
            $table->decimal('receive_plan_ctn');
            $table->boolean('is_completed')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('receive_id')->references('id')->on('receives')->cascadeOnDelete();
            $table->foreign('ledger_id')->references('id')->on('ledgers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receive_details');
    }
};
