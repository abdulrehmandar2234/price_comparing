<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SingleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = [

            [
                'currency' => '',
                'website_id' => '1',
                'list_node' => '',
                'product_name_node' => '.c-product-details__name',
                'product_description_node' => '.c-product-details__brand',
                'product_price_node' => '.c-product__price .price',
                'product_unit_price_node' => '.c-product-details__price-sm',
                'product_discount_node' => '.c-title-save-scraper',
                'product_image_node' => '.MagicZoom>img, .mz-figure>img',
            ],
            [
                'website_id' => '2',
                'product_name_node' => '.pb-right-column h2',
                'product_unit_price_node' => 'span.product-unit-price.sub',
                'product_price_node' => '.pb-right-column .content_prices .price.new',
                'product_image_node' => '.js-qv-product-cover',
                'currency' => '',
                'list_node' => '',
                'product_description_node' => '.product-variants',
                'product_discount_node' => '.price-percent-reduction',
            ],
        ];
        DB::table('single_products')->insert($websites);
    }
}
