<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            [
                'module_id' => 1,
                'class_prodi_id' => 1,
                'user_id' => 1,
                'title' => 'Logika Dasar',
                'description' => 'File PDF logika pemrograman.',
                'file_path' => 'files/ti1-logika.pdf',
                'type' => 'Dokumen',
                'created_at' => now(),
            ],
            [
                'module_id' => 2,
                'class_prodi_id' => 2,
                'user_id' => 1,
                'title' => 'Video Mesin Bubut',
                'description' => 'Pengenalan cara kerja mesin bubut.',
                'file_path' => 'files/tm1-video.mp4',
                'type' => 'Video',
                'created_at' => now(),
            ],
            [
                'module_id' => 3,
                'class_prodi_id' => 3,
                'user_id' => 1,
                'title' => 'Modul Akuntansi',
                'description' => 'Modul dasar akuntansi perusahaan.',
                'file_path' => 'files/ak1.pdf',
                'type' => 'Dokumen',
                'created_at' => now(),
            ],
            [
                'module_id' => 4,
                'class_prodi_id' => 4,
                'user_id' => 1,
                'title' => 'Tata Naskah Dinas',
                'description' => 'Dokumen resmi administrasi perkantoran.',
                'file_path' => 'files/ap1.pdf',
                'type' => 'Dokumen',
                'created_at' => now(),
            ]
        ];

        DB::table('materials')->insert($materials);
    }
}
