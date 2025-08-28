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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('original_name');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->string('disk')->default('public');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });

        // Add profile_media_id column to users table
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('profile_media_id')->nullable()->constrained('media')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['profile_media_id']);
            $table->dropColumn('profile_media_id');
        });

        Schema::dropIfExists('media');
    }
};
