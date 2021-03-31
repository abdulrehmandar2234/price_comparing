<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [

            [
                'product_name' => 'Coca Cola Zero Lata',
                'category_id' => '1',
                'brand_id' => '1',
            ],
        ];
        DB::table('products')->insert($products);
    }
}
