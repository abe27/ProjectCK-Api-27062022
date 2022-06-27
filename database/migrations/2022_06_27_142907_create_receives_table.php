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
        Schema::create('receives', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('file_gedi_id', 36)->nullable();
            $table->char('whs_id', 36)->nullable();
            $table->char('factory_id', 36)->nullable();
            $table->date('transfer_date');
            $table->string('transfer_no')->unique();
            $table->string('custom_office_no')->nullable()->default('-');
            $table->string('official_merge_no')->nullable()->default('-');
            $table->boolean('is_sync')->nullable()->default(true);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('file_gedi_id')->references('id')->on('file_gedis')->nullOnDelete();
            $table->foreign('whs_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('factory_id')->references('id')->on('factories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receives');
    }
};
