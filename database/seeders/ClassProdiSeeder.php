<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassProdiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Dasar Pemrograman',
                'description' => 'Modul pengantar logika dan struktur pemrograman untuk mahasiswa TI.',
                'image_path' => 'images/modul/ti1.jpg',
                'program_studi' => 'TI',
                'type' => 'PDF',
                'created_at' => now(),
            ],
            [
                'title' => 'Mesin Bubut',
                'description' => 'Materi pengenalan mesin bubut dalam teknik mesin.',
                'image_path' => 'images/modul/tm1.jpg',
                'program_studi' => 'TM',
                'type' => 'Video',
                'created_at' => now(),
            ],
            [
                'title' => 'Akuntansi Dasar',
                'description' => 'Dasar-dasar akuntansi untuk mahasiswa AK.',
                'image_path' => 'images/modul/ak1.jpg',
                'program_studi' => 'AK',
                'type' => 'Artikel',
                'created_at' => now(),
            ],
            [
                'title' => 'Administrasi Perkantoran Modern',
                'description' => 'Korespondensi bisnis dan administrasi digital.',
                'image_path' => 'images/modul/ap1.jpg',
                'program_studi' => 'AP',
                'type' => 'PDF',
                'created_at' => now(),
            ]
        ];

        DB::table('class_prodi')->insert($data);
    }
}
