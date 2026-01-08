<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Table;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(4)->create();

        // Create categories and products
        $categories = Category::factory(5)->create();
        $products = Product::factory(20)->state(function () use ($categories) {
            return [
                'category_id' => $categories->random()->id,
            ];
        })->create();

        // Create tables
        $tables = Table::factory(15)->create();

        // Create orders using existing tables
        $orders = Order::factory(10)->state(function () use ($tables) {
            return [
                'table_number' => $tables->random()->id,
            ];
        })->create();

        // Create order items using existing orders and products
        OrderItem::factory(30)->state(function () use ($orders, $products) {
            return [
                'order_id' => $orders->random()->id,
                'product_id' => $products->random()->id,
            ];
        })->create();

    }
}
