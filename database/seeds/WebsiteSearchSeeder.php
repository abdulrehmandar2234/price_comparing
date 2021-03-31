<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSearchSeeder extends Seeder
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
                'website_url' => 'https://comuniti.pt/en/',
                'currency' => '',
                'list_node' => '',
                'product_name_node' => '.c-product__name',
                'product_description_node' => '',
                'product_price_node' => '.c-product__price .price',
                'product_unit_price_node' => '.c-product__price-perkg',
                'product_discount_node' => '.c-product__card-section .c-badge__text',
                'product_image_node' => '.c-product__photo',
                'search_url_node' => 'https://comuniti.pt/en/jolisearch?s=PRODUCT_NAME_SEARCH',
                'product_link_node' => '.card-section a',
            ],
            [
                'website_url' => 'https://goodafter.com/pt/',
                'product_name_node' => '.product-box .product-name',
                'product_unit_price_node' => 'span.product-unit-price.sub',
                'product_price_node' => '.product-box .product-info .content_price .price.new, .product-carousel-box .group-box .content_price .price.new',
                'product_image_node' => '.product-box .preview .product-image img',
                'currency' => '',
                'list_node' => '',
                'product_description_node' => '.validade-produto',
                'product_discount_node' => 'span.price-percent-reduction',
                'search_url_node' => 'https://goodafter.com/pt/pesquisa?controller=search&s=PRODUCT_NAME_SEARCH',
                'product_link_node' => '.product-image',
            ],
        ];
        DB::table('search_websites')->insert($websites);
    }
}
