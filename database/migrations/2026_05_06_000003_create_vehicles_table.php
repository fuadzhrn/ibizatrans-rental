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
        if (Schema::hasTable('vehicles')) {
            return;
        }

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type', 20); // car or motor
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('seats')->nullable();
            $table->string('transmission', 50)->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('vehicle_type');
            $table->index('is_active');
            $table->index('sort_order');
            $table->unique(['vehicle_type', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
