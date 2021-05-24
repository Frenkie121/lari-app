<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::factory()->count(10)->create();
        \App\Models\User::factory()->count(20)->create();
        // \App\Models\Event::factory()->count(10)->create();
        $this->call([
            RoleSeeder::class,
        ]);
    }
}
