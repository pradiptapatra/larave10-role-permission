<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::insert([
            ['name'=>'role','sequence'=>1],
            ['name'=>'permission','sequence'=>2],
            ['name'=>'user','sequence'=>3]
        ]);
    }
}
