<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $ownerRole = Role::create(['name' => 'owner']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

        $userOwner = User::create([
            'name' => 'Khairunnisa',
            'occupation' => 'Educator',
            'avatar' => 'images/default-avatar.png',
            'email' => 'khairunnisa@gmail.com',
            'password' => bcrypt('12312312'),
        ]);

        $userOwner->assignRole($ownerRole);
    }
}