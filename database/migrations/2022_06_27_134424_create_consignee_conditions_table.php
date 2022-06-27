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
        Schema::create('consignee_conditions', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('consignee_id', 36);
            $table->char('condition_group_id', 36)->nullable();
            $table->string('condition_prefix')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('consignee_id')->references('id')->on('consignees')->cascadeOnDelete();
            $table->foreign('condition_group_id')->references('id')->on('condition_groups')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consignee_conditions');
    }
};
