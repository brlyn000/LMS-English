<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('program_studi_id')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();

            // Foreign key ke tabel program_studi
            $table->foreign('program_studi_id')->references('id')->on('program_studi')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
