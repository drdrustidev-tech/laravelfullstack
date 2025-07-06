<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_staff_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_staff_in');            
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('designation_id');
            $table->string('admin_staff_photo')->nullable();
            $table->foreign('admin_staff_in')->references('id')->on('admin_staff')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_staff_profiles');
    }
};
