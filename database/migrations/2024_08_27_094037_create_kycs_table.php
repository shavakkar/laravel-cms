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
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('aadhar');
            $table->string('pan');
            $table->string('permAddress1');
            $table->string('permAddress2')->nullable();
            $table->string('permState');
            $table->string('permCity');
            $table->string('permPin');
            $table->string('currentAddress1');
            $table->string('currentAddress2')->nullable();
            $table->string('currentState');
            $table->string('currentCity');
            $table->string('currentPin');
            $table->string('aadharphoto')->nullable();
            $table->string('panphoto')->nullable();
            $table->string('userphoto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kycs');
    }
};
