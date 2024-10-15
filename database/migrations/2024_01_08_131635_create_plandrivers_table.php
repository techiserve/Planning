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
        Schema::create('plandrivers', function (Blueprint $table) {
            $table->id();
            $table->string('contractplanId')->nullable();
            $table->string('routeplanId')->nullable();
            $table->string('driverId')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->date('dob')->nullable();
            $table->string('group')->nullable();
            $table->string('gender')->nullable();
            $table->string('routeType')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('licenseNumber')->nullable();
            $table->string('availability')->nullable();
            $table->string('vehicleType')->nullable();
            $table->string('statusReason')->nullable();
            $table->string('resourcePoolStatus')->nullable();
            $table->string('status')->nullable();
            $table->string('monthly')->nullable();       
            $table->string('weekly')->nullable();
            $table->string('confirmation')->nullable();   
            $table->string('daily')->nullable();
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
        Schema::dropIfExists('plandrivers');
    }
};
