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
        Schema::create('consignee_plans', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('consignee_id', 36);
            $table->enum('plan_on_day', ['-', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'])->nullable()->default('-');
            $table->string('plan_job_name')->nullable()->default('-');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('consignee_id')->references('id')->on('consignees')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consignee_plans');
    }
};
