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
        Schema::create('order_zone_types', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('factory_id', 36);
            $table->integer('zone_id');
            $table->string('zone_name');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('factory_id')->references('id')->on('factories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_zone_types');
    }
};
