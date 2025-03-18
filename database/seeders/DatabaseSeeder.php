<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::factory()->create([
            'nik' => '3326165206560xxx'
        ]);

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@jaswitajabar.co.id',
            'userable_type' => Admin::class,
            'userable_id' => 1
        ]);
    }
}
