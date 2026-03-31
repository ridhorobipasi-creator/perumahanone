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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->integer('land_size')->nullable();
            $table->integer('build_size')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->json('amenities')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->text('address')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('status')->default('available');
            $table->boolean('is_featured')->default(false);
            $table->string('main_image')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
