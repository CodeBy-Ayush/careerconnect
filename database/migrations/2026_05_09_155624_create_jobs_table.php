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
        Schema::create('jobs', function (Blueprint $table) {
        $table->id();
        $table->string('title', 150);
        $table->string('slug', 200)->unique();
        $table->string('company', 100);
        $table->string('company_logo', 255)->nullable();
        $table->string('location', 100);
        $table->enum('job_type', ['full-time', 'part-time', 'remote', 'internship', 'contract']);
        $table->foreignId('category_id')->constrained();
        $table->decimal('salary_min', 10, 2)->nullable();
        $table->decimal('salary_max', 10, 2)->nullable();
        $table->string('salary_currency', 5)->default('USD');
        $table->longText('description');
        $table->longText('requirements');
        $table->longText('responsibilities')->nullable();
        $table->string('experience_required', 50)->nullable();
        $table->date('deadline')->nullable();
        $table->boolean('is_active')->default(true);
        $table->boolean('is_featured')->default(false);
        $table->foreignId('posted_by')->constrained('users');
        $table->integer('views_count')->default(0);
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
