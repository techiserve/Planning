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
        Schema::create('routecapacities', function (Blueprint $table) {
            $table->id();
            $table->string('route')->nullable();
            $table->integer('contractVolume')->nullable();
            $table->integer('totalforecast')->nullable();
            $table->integer('monthlyforecast')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('additionalcapacityrequired')->nullable();
            $table->string('status')->nullable();
            $table->string('createdBy')->nullable();
            $table->string('updatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routecapacities');
    }
};
