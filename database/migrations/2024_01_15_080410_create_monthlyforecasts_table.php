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
        Schema::create('monthlyforecasts', function (Blueprint $table) {
            $table->id();
            $table->string('horizon')->nullable();
            $table->string('route')->nullable();
            $table->string('contract')->nullable();
            $table->string('forecastValue')->nullable();
            $table->string('description')->nullable();
            $table->string('month')->nullable();
            $table->string('status')->nullable();
            $table->string('updatedBy')->nullable();
            $table->string('createdBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthlyforecasts');
    }
};
