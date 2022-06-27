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
        Schema::create('ftickets', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('pallet_detail_id', 36);
            $table->char('carton_id', 36)->nullable();
            $table->integer('seq');
            $table->string('running_no', 10)->unique();
            $table->boolean('is_printed')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('pallet_detail_id')->references('id')->on('invoice_pallet_details')->cascadeOnDelete();
            $table->foreign('carton_id')->references('id')->on('cartons')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ftickets');
    }
};
