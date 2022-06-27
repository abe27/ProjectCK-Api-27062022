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
        Schema::create('companies', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('district_id', 36)->nullable();
            $table->string('company_name');
            $table->string('contact_name')->nullable()->default('-');
            $table->longText('address_1');
            $table->longText('address_2')->nullable()->default('-');
            $table->string('zip_code')->nullable()->default('-');
            $table->string('tel_no')->nullable()->default('-');
            $table->string('fax_no')->nullable()->default('-');
            $table->string('company_log_url')->nullable()->default('-');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
