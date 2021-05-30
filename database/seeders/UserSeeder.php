<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $user = User::create([
            'name' => $faker->name(),
            'email' => 'lari@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        
        $user->assignRole('Teacher');
    }
}
