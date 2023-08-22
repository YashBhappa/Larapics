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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('file');
            $table->string('dimension');
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('downloads_count')->default(0);
            // $table->unsignedInteger('likes_count')->default(0);
            // $table->unsignedInteger('comments_count')->default(0);
            // $table->unsignedInteger('shares_count')->default(0);
            // $table->boolean('is_featured')->default(false);
            // $table->boolean('is_premium')->default(false);
            // $table->boolean('is_private')->default(false);
            // $table->boolean('is_approved')->default(false);
            $table->boolean('is_published')->default(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
