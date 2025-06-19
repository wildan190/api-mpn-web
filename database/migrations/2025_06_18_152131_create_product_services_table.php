<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductServicesTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description');
            $table->enum('status', ['coming soon', 'released'])->default('coming soon');
            $table->string('upload_picture')->nullable(); // for image upload
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_services');
    }
}
