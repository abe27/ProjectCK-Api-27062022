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
        Schema::create('profiles', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->uuid('user_id');
            $table->char('whs_id', 36)->nullable();
            $table->char('factory_id', 36)->nullable();
            $table->char('section_id', 36)->nullable();
            $table->char('position_id', 36)->nullable();
            $table->char('permission_id', 36)->nullable();
            $table->char('district_id', 36)->nullable();
            $table->char('company_id', 36)->nullable();
            $table->string('full_name')->nullable()->default('-');
            $table->longText('address_1');
            $table->longText('address_2')->nullable()->default('-');
            $table->string('zip_code')->nullable()->default('-');
            $table->string('exp_no')->nullable()->default('-');
            $table->string('mobile_no')->nullable()->default('-');
            $table->string('fax_no')->nullable()->default('-');
            $table->string('avatar_url')->nullable()->default('-');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('whs_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('factory_id')->references('id')->on('factories')->nullOnDelete();
            $table->foreign('section_id')->references('id')->on('sections')->nullOnDelete();
            $table->foreign('position_id')->references('id')->on('positions')->nullOnDelete();
            $table->foreign('permission_id')->references('id')->on('user_permissions')->nullOnDelete();
            $table->foreign('district_id')->references('id')->on('districts')->nullOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
