<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->json('file_paths')->nullable()->after('file_path');
        });
        
        // Migrate existing data
        DB::table('submissions')->get()->each(function ($submission) {
            if ($submission->file_path) {
                DB::table('submissions')
                    ->where('id', $submission->id)
                    ->update(['file_paths' => json_encode([$submission->file_path])]);
            }
        });
        
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }

    public function down(): void
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('user_id');
        });
        
        // Migrate data back
        DB::table('submissions')->get()->each(function ($submission) {
            if ($submission->file_paths) {
                $paths = json_decode($submission->file_paths, true);
                if (!empty($paths)) {
                    DB::table('submissions')
                        ->where('id', $submission->id)
                        ->update(['file_path' => $paths[0]]);
                }
            }
        });
        
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropColumn('file_paths');
        });
    }
};