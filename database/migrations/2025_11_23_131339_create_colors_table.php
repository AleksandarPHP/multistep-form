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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_active')->default(false);
            $table->integer('priority')->nullable();
            $table->json('product_id')->nullable();
            $table->timestamps();
        });

        Schema::create('color_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('option_id')->nullable();
            $table->timestamps();
        });

        Schema::create('color_color_item', function (Blueprint $table) {
            $table->id();

            $table->foreignId('color_id')->constrained()->onDelete('cascade');
            $table->foreignId('color_item_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
