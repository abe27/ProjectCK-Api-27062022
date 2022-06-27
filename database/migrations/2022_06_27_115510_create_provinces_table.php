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
        Schema::create('provinces', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('countries_id', 36);
            $table->string('name')->unique();
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('countries_id')->references('id')->on('countries')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
};
