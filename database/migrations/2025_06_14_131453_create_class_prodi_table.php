<?php

// database/migrations/xxxx_xx_xx_create_class_prodi_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassProdiTable extends Migration
{
    public function up()
    {
        Schema::create('class_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul modul kelas
            $table->text('description')->nullable(); // Deskripsi modul
            $table->string('image_path')->nullable(); // Gambar card modul
            $table->string('program_studi'); // TI, AK, AP, TM
            $table->enum('type', ['Video', 'PDF', 'Artikel'])->default('PDF'); // Tipe konten
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_prodi');
    }
}
