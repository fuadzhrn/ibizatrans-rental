<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('badge')->nullable();
            $table->string('destination_summary')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('highlight')->nullable();
            $table->string('image')->nullable();
            $table->integer('starting_price')->nullable();
            $table->string('duration_label')->nullable();
            $table->text('whatsapp_text')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_packages');
    }
};
