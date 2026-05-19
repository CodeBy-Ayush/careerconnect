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
        Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('title', 150);
        $table->string('slug', 200)->unique();
        $table->string('provider', 100);
        $table->string('provider_logo', 255)->nullable();
        $table->foreignId('category_id')->constrained();
        $table->enum('level', ['beginner', 'intermediate', 'advanced']);
        $table->decimal('duration_hours', 5, 1)->nullable();
        $table->decimal('price', 10, 2)->nullable();
        $table->boolean('is_free')->default(false);
        $table->string('url', 500);
        $table->string('thumbnail', 255)->nullable();
        $table->longText('description');
        $table->text('skills_covered')->nullable();
        $table->decimal('rating', 2, 1)->nullable();
        $table->boolean('is_active')->default(true);
        $table->boolean('is_featured')->default(false);
        $table->foreignId('posted_by')->constrained('users');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
