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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("make");
            $table->string("model");
            $table->integer("year");
            $table->string("color");
            $table->integer("milage");
            $table->integer("price");
            $table->string("fuelType");
            $table->string("transmission");
            $table->string("engine");
            $table->integer("horsepower");
            $table->integer("owners");
            $table->string("image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
