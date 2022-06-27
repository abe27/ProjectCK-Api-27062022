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
        Schema::create('whs', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('whs_type_id', 36)->nullable();
            $table->string('name')->unique();
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('whs_type_id')->references('id')->on('whs_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whs');
    }
};
