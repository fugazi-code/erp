<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Organization;
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
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        Organization::factory(5)->hasUsers(10)->create();
        Category::factory(10)->hasSubCategory(5)->create();
        Brand::factory(5)->create();
        Product::factory(200)->create();
    }
}
