<?php

namespace Database\Seeders;

use App\Models\Jobs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Jobs::create([
            'name' => "FrontEnd Web Programmer",
            'created_by' => 1,
        ]);
        Jobs::create([
            'name' => "Fullstack Web Programmer",
            'created_by' => 1,
        ]);
        Jobs::create([
            'name' => "Quality Control",
            'created_by' => 1,
        ]);
    }
}
