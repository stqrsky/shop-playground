<?php

use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Product::all();

        App\Category::all()->each(function ($category) use ($products) {
            $category->products()->attach(
                $products->random(rand(10, 30))->pluck('id')->toArray()
            );
        });
    }
}
