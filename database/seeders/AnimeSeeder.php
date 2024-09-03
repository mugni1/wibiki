<?php

namespace Database\Seeders;

use App\Models\anime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           //TRUNCATE
           Schema::disableForeignKeyConstraints();
           anime::truncate();
           Schema::enableForeignKeyConstraints();
           
        anime::factory(10)->create();
    }
}