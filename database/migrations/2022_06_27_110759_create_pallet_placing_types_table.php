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
        Schema::create('pallet_placing_types', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('factory_id', 36)->nullable();
            $table->string('name');
            $table->longText('description')->nullable()->default('-');
            $table->decimal('width')->nullable()->default(0);
            $table->decimal('length')->nullable()->default(0);
            $table->decimal('height')->nullable()->default(0);
            $table->decimal('per_pallet')->nullable()->default(0);
            $table->decimal('carton_size_width')->nullable()->default(0);
            $table->decimal('carton_size_length')->nullable()->default(0);
            $table->decimal('carton_size_height')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('pallet_placing_types');
    }
};
