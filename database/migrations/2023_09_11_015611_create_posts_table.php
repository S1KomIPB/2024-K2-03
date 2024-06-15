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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lab_id');
            $table->foreignId('jenjang_id');
            $table->foreignId('user_id');
            // $table->string('dosenFirstName');
            // $table->string('dosenLastName');
            $table->string('url')->default('')->nullable;
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('poster');
            $table->string('pdf')->nullable();
            $table->text('abstract');
            $table->date('published_at')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
