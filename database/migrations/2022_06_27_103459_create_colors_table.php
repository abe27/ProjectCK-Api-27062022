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
        Schema::create('colors', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name')->unique();
            $table->string('first_hex_code')->nullable()->default('-');
            $table->string('second_hex_code')->nullable()->default('-');
            $table->string('third_hex_code')->nullable()->default('-');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
};
