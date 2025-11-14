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
            $table->string('photo1_url', 255);
            $table->string('photo2_url', 255);
            $table->string('photo3_url', 255);
            $table->string('brand', 100);
            $table->string('model', 100);
            $table->string('color', 50);
            $table->year('year'); 
            $table->integer('mileage');
            $table->decimal('price', 10, 2);
            $table->text('details')->nullable();
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
