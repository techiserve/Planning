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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('provider')->nullable();
            $table->string('client')->nullable();
            $table->string('clientTwo')->nullable();
            $table->string('activity')->nullable();
            $table->string('duration')->nullable();
            $table->string('forecastMonthlyVolume')->nullable();
            $table->string('forecastWeeklyVolume')->nullable();
            $table->string('forecastDailyVolume')->nullable();
            $table->string('requiredMonthlyDistance')->nullable();
            $table->string('requiredMonthlyVolume')->nullable();
            $table->string('requiredMonthlyQuantity')->nullable();
            $table->string('forecastWeeklyVolumes')->nullable();
            $table->string('forecastDailyVolumes')->nullable();
            $table->string('commodity')->nullable();
            $table->string('RouteType')->nullable();
            $table->string('RouteId')->nullable();
            $table->string('rate')->nullable();
            $table->string('effectiveDate')->nullable();
            $table->string('formula')->nullable();
            $table->string('contractValue')->nullable();
            $table->string('price')->nullable();
            $table->string('totalVolume')->nullable();
            $table->string('resourcePoolStatus')->nullable();
            $table->string('routeresourcePoolStatus')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
