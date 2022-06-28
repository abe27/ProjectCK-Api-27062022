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
        Schema::create('container_sizes', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->string('name')->unique();
            $table->decimal('dim_width')->nullable()->default(0);
            $table->decimal('dim_length')->nullable()->default(0);
            $table->decimal('dim_height')->nullable()->default(0);
            $table->enum('unit', ['-', 'mm', 'cm', 'in', 'm'])->nullable()->default('-');
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
        Schema::dropIfExists('container_sizes');
    }
};
