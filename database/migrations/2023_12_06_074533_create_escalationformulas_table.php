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
        Schema::create('escalationformulas', function (Blueprint $table) {
            $table->id();
            $table->string('costComponent')->nullable();
            $table->float('weightage')->nullable();
            $table->string('indexSourceTable')->nullable();
            $table->float('baseIndices')->nullable();
            $table->date('baseDate')->nullable();
            $table->float('endIndices')->nullable();
            $table->date('endDate')->nullable();
            $table->string('frequency')->nullable();
            $table->integer('route')->nullable();
            $table->integer('contract')->nullable();
            $table->string('status')->nullable();
            $table->string('updatedBy')->nullable();
            $table->string('createdBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escalationformulas');
    }
};
