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
            $table->char('container_size_id', 36)->nullable();
            $table->date('container_date');
            $table->string('container_no', 50);
            $table->string('seal_no',50);
            $table->string('vessel', 50)->nullable();
            $table->string('loading_port', 50)->nullable();
            $table->dateTime('container_enter_at')->nullable();
            $table->dateTime('container_release_at')->nullable();
            $table->enum('is_status', ['E', 'L', 'R', 'C', 'H'])->nullable()->default('E');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('container_type_id')->references('id')->on('container_types')->nullOnDelete();
            $table->foreign('container_size_id')->references('id')->on('container_sizes')->nullOnDelete();
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
