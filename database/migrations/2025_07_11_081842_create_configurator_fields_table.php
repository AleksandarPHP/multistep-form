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
        Schema::create('configurator_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('step_id')->constrained('configurator_steps')->onDelete('cascade');
            $table->string('label');
            $table->string('name')->unique();
            $table->enum('type', ['text', 'select', 'number', 'checkbox']);
            $table->boolean('required')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurator_fields');
    }
};
