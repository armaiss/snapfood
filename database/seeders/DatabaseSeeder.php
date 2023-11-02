<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Couchbase\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([PermissionSeeder::class,RoleSeeder::class]);

        $admin = \App\Models\User::query()->create([
            'name'=>'zahra',
            'email'=>'zahra@gmail.com',
            'password'=>bcrypt('zahra'),
            'phone_number'=>'09197521026',
        ]);
        $admin->assignRole(Role::query()->first());
    }

}
