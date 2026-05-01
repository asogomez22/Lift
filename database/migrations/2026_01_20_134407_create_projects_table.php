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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Project title
            $table->text('description')->nullable(); // Project description
            $table->string('image_path'); // Path to project image
            $table->string('tags')->nullable(); // Comma-separated tags
            $table->integer('display_order')->default(0); // For custom ordering
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
