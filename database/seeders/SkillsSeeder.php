<?php

namespace Database\Seeders;

use App\Models\Skills;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skills::create([
            'name' => "PHP",
            'created_by' => 1,
        ]);
        Skills::create([
            'name' => "PostgreSQL",
            'created_by' => 1,
        ]);
        Skills::create([
            'name' => "API (JSON, REST)",
            'created_by' => 1,
        ]);
    }
}
