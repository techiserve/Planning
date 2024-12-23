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
        Schema::create('plandetails', function (Blueprint $table) {
            $table->id();
            $table->integer('plan_id')->nullable();
            $table->string('name')->nullable();
            $table->string('route')->nullable();
            $table->integer('routeId')->nullable();
            $table->integer('driver_id')->nullable();
            $table->string('date')->nullable();
            $table->string('truck')->nullable();
            $table->string('shift')->nullable();
            $table->string('trips')->nullable();
            $table->string('time')->nullable();
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
        Schema::dropIfExists('plandetails');
    }
};
