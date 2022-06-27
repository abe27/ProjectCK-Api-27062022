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
        Schema::create('pallet_placing_type_images', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('pallet_placing_id', 36);
            $table->string('image_url');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('pallet_placing_id')->references('id')->on('pallet_placing_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pallet_placing_type_images');
    }
};
