<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_links = [

            [
                'website_id' => '1',
                'product_id' => '1',
                'product_link' => 'https://comuniti.pt/pt/colas/4702-coca-cola-zero-lata-5449000131805.html',
                'product_discount' => '',
                'product_price' => '',
                'product_unit' => '',
                'product_unit_price' => '',
                'product_updated' => '',
                'product_image' => '',
               
            ],
           
        ];
        DB::table('product_links')->insert($product_links);
    }
}
