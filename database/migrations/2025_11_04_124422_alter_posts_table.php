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
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('body', 'content');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrainer()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('content', 'body');
            $table->dropColumn(['slug', 'image', 'published_at', 'category_id']);
        });
    }
};
