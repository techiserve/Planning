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
        Schema::create('planassets', function (Blueprint $table) {
            $table->id();
            $table->string('contractplanId')->nullable();
            $table->string('routeplanId')->nullable();
            $table->string('assetId')->nullable();
            $table->string('make')->nullable();
            $table->string('registration')->nullable();
            $table->string('assetDescription')->nullable();
            $table->string('vinNumber')->nullable();
            $table->string('description')->nullable();
            $table->string('assetType')->nullable();
            $table->integer('weight')->nullable();
            $table->string('model')->nullable();
            $table->string('registrationYear')->nullable();
            $table->string('engineCapacity')->nullable();
            $table->string('expectedFuelConsumption')->nullable();
            $table->string('truckType')->nullable();
            $table->string('trailerType')->nullable();
            $table->string('gearType')->nullable();
            $table->integer('tonnage')->nullable();
            $table->integer('driverId')->nullable();
            $table->string('statusReason')->nullable();
            $table->integer('routeId')->nullable();
            $table->string('licenseNumber')->nullable();
            $table->integer('payloadCapacity')->nullable();
            $table->string('status')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('fueltype')->nullable();
            $table->string('monthly')->nullable();    
            $table->string('confirmation')->nullable();    
            $table->string('weekly')->nullable();
            $table->string('daily')->nullable();
            $table->string('resourcePoolStatus')->nullable();
            $table->date('registrationExpireDate')->nullable();
            
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
        Schema::dropIfExists('planassets');
    }
};
