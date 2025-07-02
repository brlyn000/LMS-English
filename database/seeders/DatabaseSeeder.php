<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use ClassProdiSeeder;
use Illuminate\Database\Seeder;
use MaterialSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassProdiSeeder::class,
            MaterialSeeder::class,
        ]);
    }
}
