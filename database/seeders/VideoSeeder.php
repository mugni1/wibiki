<?php

namespace Database\Seeders;

use App\Models\video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //TRUNCATE
         Schema::disableForeignKeyConstraints();
         video::truncate();
         Schema::enableForeignKeyConstraints();

         video::factory(200)->create();
    }
}