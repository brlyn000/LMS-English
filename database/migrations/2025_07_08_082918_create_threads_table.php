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
    Schema::create('threads', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('body');
        $table->string('image_path')->nullable(); // kolom untuk menyimpan path gambar
        $table->string('program_studi'); // kolom untuk prodi user
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pembuat thread
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
