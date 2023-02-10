<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(1,500);
        $discount = $this->faker->numberBetween(1,10);
        $tax = $this->faker->numberBetween(1,10);

        return [
            'product_id' => Product::query()->inRandomOrder()->first()->id,
            'qty' => 0,
            'price' => $price,
            'discount' => $discount,
            'tax' => $tax,
            'sub_total' => $price + $discount + $tax,
        ];
    }
}
