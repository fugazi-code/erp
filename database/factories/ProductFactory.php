<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = Category::with('subCategory')->inRandomOrder()->first();
        $subCategory = $category->subCategory->inRandomOrder()->first();
        $brand = Brand::query()->inRandomOrder()->first();

        return [
            'category_id' => $category->id,
            'sub_category_id' => $subCategory->id,
            'brand_id' => $brand->id,
            'name' => $this->faker->word(),
            'sku' => $this->faker->buildingNumber(),
            'selling_price' => $this->faker->numberBetween(0, 1000),
            'vendor_price' => $this->faker->numberBetween(0, 1000),
            'unit' => 'pc',
            'qty' => 0,
            'created_by' => 1
        ];
    }
}
