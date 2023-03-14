<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Supplier;
use App\Enums\SalesStatusEnum;
use App\Enums\SalesPaymentEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "customer_id" => Customer::query()->inRandomOrder()->first()->id,
            "supplier_id" => Supplier::query()->inRandomOrder()->first()->id,
            "sale_date" => $this->faker->dateTimeBetween('-1 year'),
            "order_tax" => $this->faker->numberBetween(0, 100),
            "discount" => $this->faker->numberBetween(0, 100),
            "shipping"=> $this->faker->numberBetween(0, 100),
            "status"=> SalesStatusEnum::COMPLETED,
            "payment"=> $this->faker->randomElement([SalesPaymentEnum::PAID, SalesPaymentEnum::UNPAID]),
            'created_by' => 1
        ];
    }
}
