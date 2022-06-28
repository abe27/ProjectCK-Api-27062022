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
        Schema::create('receive_mail_boxes', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('whs_id', 36);
            $table->string('mail_box_id', 7);
            $table->string('mail_box_pwd', 50);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('whs_id')->references('id')->on('whs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receive_mail_boxes');
    }
};
