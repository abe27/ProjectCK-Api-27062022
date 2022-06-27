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
        Schema::create('condition_groups', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('order_zone_type_id', 36)->nullable();
            $table->enum('name', ['N', 'E', 'F', 'S']);//N=All,F=First,E=End,S=Split Order
            $table->integer('substr_digits')->nullable()->default(0);
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('order_zone_type_id')->references('id')->on('order_zone_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condition_groups');
    }
};
