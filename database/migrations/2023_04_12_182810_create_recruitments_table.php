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
        
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('job_id');
            $table->string('user_id');
            $table->string('applicant_id');
            $table->string('fullname');
            $table->string('image_user');
            $table->string('logo');
            $table->string('email');
            $table->string('notelp');
            $table->string('jenis');
            $table->string('jobtitle');
            $table->string('cv');
            $table->string('document')->nullable();
            $table->timestamps();
        });
        
    }
    
    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
