<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ilhams;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Student::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Ilhams::create([
            'name' => '11 PPLG 1'
        ]);

        Ilhams::create([
            'name' => '10 PPLG 1'
        ]);
        Ilhams::create([
            'name' => '11 PPLG 2'
        ]);
        Ilhams::create([
            'name' => '10 PPLG 2'
        ]);
        Ilhams::create([
            'name' => '12 PPLG 1'
        ]);
        Ilhams::create([
            'name' => '12 PPLG 2'
        ]);
    }
}
