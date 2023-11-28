<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
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

        $admin = \App\Models\User::query()->create([
            'name' => 'zahra',
            'email' => 'zahra@gmail.com',
            'password' => bcrypt('11111111'),
            'phone_number' => '09197521026',
        ]);
        $admin->assignRole(Role::findByName('admin'));

        $user = \App\Models\User::query()->create([
            'name' => 'sara',
            'email' => 'sara@gmail.com',
            'password' => bcrypt('11111111'),
            'phone_number' => '09197521025',
        ]);
        $user->assignRole(Role::findByName('shop_manager'));
        $rcat1 = RestaurantCategory::query()->create([
            'name' => 'فست فود'
        ]);
        $rcat2= RestaurantCategory::query()->create([
            'name' => 'سنتی'
        ]);
        $rcat3=RestaurantCategory::query()->create([
            'name' => 'کافی شاپ'
        ]);

        FoodCategory::query()->create([
            'name' => 'سالاد'
        ]);
        $cat1 = FoodCategory::query()->create([
            'name' => 'پیتزا'
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
            'user_id'=>$user->id,
            'restaurant_category_id' =>$rcat1->id,
            'address'=>'',
            'name'=>'Restaurant',
            'telephone'=>'09197521026',
            'bank_account_number'=>"1242387459256",
            'longitude'=>'40',
            'latitude'=>'40'
        ]);
    }

}
