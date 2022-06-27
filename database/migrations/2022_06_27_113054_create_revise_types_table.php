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
        Schema::create('revise_types', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('revise_code', 5)->unique();
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_revise')->nullable()->default(true);
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
        Schema::dropIfExists('revise_types');
    }
};
