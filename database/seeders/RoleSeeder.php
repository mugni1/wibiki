<?php

namespace Database\Seeders;

use App\Models\role;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            //TRUNCATE
            Schema::disableForeignKeyConstraints();
            role::truncate();
            Schema::enableForeignKeyConstraints();

            $data = [
                ['name'=>'admin'],
            ];
            
            foreach ($data as $value) {
                role::create([
                    'name'=>$value['name'],
                ]);
            }
            
    }
}