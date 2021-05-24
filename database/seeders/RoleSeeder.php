<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Manage event']);
        // Permission::create(['name' => 'Manage event']);

        $teacher = Role::create(['name' => 'Teacher']);
        $teacher->givePermissionTo('Manage event');

        $teacher = Role::create(['name' => 'Student']);
        // $teacher->givePermissionTo('Manage event');

        $users = User::find([1, 2, 3, 4, 5]);
        $users->each(function($user){
            $user->assignRole('Teacher');
        });

        User::whereNotIn('id', $users->pluck('id')->toArray())
            ->each(function($user){
                $user->assignRole('Student');
            });
    }
}
