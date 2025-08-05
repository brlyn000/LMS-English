<?php

// database/migrations/xxxx_xx_xx_create_materials_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->enum('type', ['Dokumen', 'Video', 'Tugas', 'Link']);
            $table->unsignedBigInteger('class_prodi_id');
            $table->foreign('class_prodi_id')->references('id')->on('class_prodi')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pembuat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
