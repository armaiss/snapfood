<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodCategory;
use App\Models\Restaurant;
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
        $this->call([PermissionSeeder::class, RoleSeeder::class]);

        $user = \App\Models\User::query()->create([
            'name' => 'zahra',
            'email' => 'zahra@gmail.com',
            'password' => bcrypt('zahra'),
            'phone_number' => '09197521026',
        ]);
        $user->assignRole(Role::query()->first());
        FoodCategory::query()->create([
            'name' => 'سالاد'
        ]);
        $cat1 = FoodCategory::query()->create([
            'name' => 'فست فود'
        ]);
        $cat2 = FoodCategory::query()->create([
            'name' => 'ایرانی'
        ]);
        $cat3 = FoodCategory::query()->create([
            'name' => 'دریایی'
        ]);
        $cat4 = FoodCategory::query()->create([
            'name' => 'فرنگی'
        ]);
        Restaurant::query()->create([
            'user_id' => $user->id,
            'restaurant_category_id' => $cat1->id,
            'address'=>'address',
            'name'=>'adminRestaurant',
            'telephone'=>'09197521026',
            'longitude'=>'40',
            'latitude'=>'40'
        ]);
    }

}
