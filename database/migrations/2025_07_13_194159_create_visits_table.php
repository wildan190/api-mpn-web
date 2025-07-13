<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            // Simpan informasi model yang dikunjungi
            $table->string('visitable_type');
            $table->unsignedBigInteger('visitable_id');

            // Info pengunjung
            $table->string('ip_address')->nullable();

            // Timestamps
            $table->timestamps();

            // Index untuk kecepatan query
            $table->index(['visitable_type', 'visitable_id'], 'visitable_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
