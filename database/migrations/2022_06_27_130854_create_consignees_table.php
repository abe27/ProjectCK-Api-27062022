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
        Schema::create('consignees', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('profile_id', 36)->nullable();
            $table->char('factory_id', 36)->nullable();
            $table->char('affiliates_id', 36)->nullable();
            $table->char('customer_id', 36);
            $table->char('customer_address_id', 36)->nullable();
            $table->string('prefix', 5)->nullable()->default('-');
            $table->integer('last_running_no')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('profile_id')->references('id')->on('profiles')->nullOnDelete();
            $table->foreign('factory_id')->references('id')->on('factories')->nullOnDelete();
            $table->foreign('affiliates_id')->references('id')->on('affiliates')->nullOnDelete();
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->foreign('customer_address_id')->references('id')->on('addresses')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consignees');
    }
};
