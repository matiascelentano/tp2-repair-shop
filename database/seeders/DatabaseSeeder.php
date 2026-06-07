<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test One',
            'email' => 'test1@example.com',
            'password' => bcrypt('123456'),
        ]);

        User::factory()->create([
            'name' => 'Test Two',
            'email' => 'test2@example.com',
            'password' => bcrypt('123456'),
        ]);
        // Seed repairs
        $this->call(RepairSeeder::class);
    }
}
