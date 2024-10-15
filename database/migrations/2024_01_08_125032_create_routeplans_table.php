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
        Schema::create('routeplans', function (Blueprint $table) {
            $table->id();
            $table->integer('duration')->nullable();       
            $table->integer('route')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('month')->nullable();    
            $table->integer('activity')->nullable();      
            $table->integer('week')->nullable();
            $table->integer('daily')->nullable();    
            $table->integer('status')->nullable();
            $table->string('confirmation')->nullable();   
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
        Schema::dropIfExists('routeplans');
    }
};
