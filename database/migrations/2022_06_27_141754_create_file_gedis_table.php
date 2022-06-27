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
        Schema::create('file_gedis', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('mailbox_id', 36)->nullable();// Mailbox
            $table->string('batch_id', 10);// Batch
            $table->decimal('file_size')->nullable()->default(0);// Size
            $table->string('file_name');// Description (Batch ID)
            $table->string('file_path');// UploadCreation Date
            $table->dateTime('file_uploaded');
            $table->string('flag', 5);// Flags
            $table->string('format', 1);// Format
            $table->string('originator', 10);// Originator
            $table->boolean('is_downloaded')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->longText('file_link')->nullable()->default('-');
            $table->timestamps();
            $table->foreign('mailbox_id')->references('id')->on('receive_mail_boxes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_gedis');
    }
};
