<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('header_image')->nullable();
            $table->string('slug')->unique();
            $table->date('date');
            $table->string('article_body_image')->nullable();
            $table->string('alt_body_image')->nullable();
            $table->longText('article_body');
            $table->enum('status', ['draft', 'publish', 'delist'])->default('draft');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
