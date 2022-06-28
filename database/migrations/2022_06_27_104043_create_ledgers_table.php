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
        Schema::create('ledgers', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('tap_group_id', 36)->nullable();
            $table->char('whs_id', 36)->nullable();
            $table->char('factory_id', 36)->nullable();
            $table->char('part_type_id', 36)->nullable();
            $table->char('part_id', 36);
            $table->char('kind_id', 36)->nullable();
            $table->char('size_id', 36)->nullable();
            $table->char('color_id', 36)->nullable();
            $table->char('unit_id', 36)->nullable();
            $table->char('part_vendor_id', 36)->nullable();
            $table->decimal('width', 36)->nullable()->default(0);
            $table->decimal('length', 36)->nullable()->default(0);
            $table->decimal('height', 36)->nullable()->default(0);
            $table->decimal('gross_weight', 36)->nullable()->default(0);
            $table->decimal('net_weight', 36)->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('tap_group_id')->references('id')->on('tap_groups')->nullOnDelete();
            $table->foreign('whs_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('factory_id')->references('id')->on('factories')->nullOnDelete();
            $table->foreign('part_type_id')->references('id')->on('part_types')->nullOnDelete();
            $table->foreign('part_id')->references('id')->on('parts')->cascadeOnDelete();
            $table->foreign('kind_id')->references('id')->on('kinds')->nullOnDelete();
            $table->foreign('size_id')->references('id')->on('sizes')->nullOnDelete();
            $table->foreign('color_id')->references('id')->on('colors')->nullOnDelete();
            $table->foreign('unit_id')->references('id')->on('unit_types')->nullOnDelete();
            $table->foreign('part_vendor_id')->references('id')->on('part_vendors')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
};
