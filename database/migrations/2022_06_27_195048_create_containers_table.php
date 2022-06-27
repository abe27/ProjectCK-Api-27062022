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
        Schema::create('containers', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('container_type_id', 36)->nullable();
            $table->date('container_date');
            $table->string('container_no', 25);
            $table->string('seal_no', 25);
            $table->boolean('is_closed')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('container_type_id')->references('id')->on('container_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('containers');
    }
};
