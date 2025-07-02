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
            $table->enum('type', ['tugas', 'materi']);
            $table->string('class_prodi_id'); // TI, TM, AK, AP
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pembuat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
