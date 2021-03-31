<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
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
                'website_name' => 'Comuniti',
                'website_url' => 'https://comuniti.pt/en/',
                'website_logo' => '1605268801comunitipt-logo.jpg',
            ],
            [
                'website_name' => 'GoodAfter',
                'website_url' => 'https://goodafter.com/pt/',
                'website_logo' => 'goodafter-logo.jpg',
            ],
            [
                'website_name' => 'Auchan',
                'website_url' => 'https://www.auchan.pt/Frontoffice/',
                'website_logo' => 'logo-auchan.png',
            ],

            [
                'website_name' => 'Continente',
                'website_url' => 'https://www.continente.pt/pt-pt/public/Pages/homepage.aspx',
                'website_logo' => '1615200786Capturesas.png',
            ],
            [
                'website_name' => 'Spar',
                'website_url' => 'https://www.spar.pt/',
                'website_logo' => 'spar.png',
            ],
            [
                'website_name' => 'celeiro',
                'website_url' => 'https://www.celeiro.pt/',
                'website_logo' => '1615201815celeiro.png',
            ],
            [
                'website_name' => 'froiz',
                'website_url' => 'https://www.froiz.pt/',
                'website_logo' => '1615202358froiz.png',
            ],
            [
                'website_name' => 'e-leclerc',
                'website_url' => 'https://www.e-leclerc.pt/',
                'website_logo' => '1615202446e.png',
            ],
            [
                'website_name' => 'mercadao',
                'website_url' => 'https://mercadao.pt/api/Campaigns/catalogue/5b2d35b85ce104001af36fca/products?limit=25',
                'website_logo' => 'mercadao.png',
            ],
            [
                'website_name' => 'Lidl',
                'website_url' => 'https://www.lidl.pt/pt/',
                'website_logo' => 'lidl.png',
            ],
            [
                'website_name' => 'Bolama',
                'website_url' => 'http://www.bolama.pt/',
                'website_logo' => 'bolama.png',
            ],
            [
                'website_name' => 'Go Natural',
                'website_url' => 'https://lojaonline.gonatural.pt/',
                'website_logo' => 'gonatural.png',
            ],
            [
                'website_name' => 'Aldi',
                'website_url' => 'https://www.aldi.pt/',
                'website_logo' => 'aldi.png',
            ],
            [
                'website_name' => 'Minipreco',
                'website_url' => 'https://lojaonline.minipreco.p',
                'website_logo' => 'minipreco.png',
            ],
            [
                'website_name' => 'Myapolonia',
                'website_url' => 'https://myapolonia.com/',
                'website_logo' => 'myapolonia.png',
            ],
            // [
            //     'website_url' => 'https://www.celeiro.pt/',
            //     'product_name_node' => '.products-slider .product-items .product-item .product-item-info .product-item-name a',
            //     'product_unit_price_node' => '.products-slider .product-items .product-item .apresentacao',
            //     'product_price_node' => '.products-slider .product-items .product-item .price-box .price',
            //     'product_image_node' => '.products-slider .product-items .product-item img',
            //     'currency' => '',
            //     'list_node' => '',
            //     'product_description_node' => '',
            //     'product_discount_node' => '',
            //     'product_link_node' => '',

            // ],
            // [
            //     'website_url' => 'https://www.spar.pt/',
            //     'product_name_node' => '.item-box .product-title a',
            //     'product_unit_price_node' => '.base-price-pangv',
            //     'product_price_node' => '.item-box .actual-price',
            //     'product_image_node' => '.item-box .picture a img',
            //     'currency' => '',
            //     'list_node' => '',
            //     'product_description_node' => '',
            //     'product_discount_node' => '',
            //     'product_link_node' => '',
            // ],

        ];
        DB::table('websites')->insert($websites);
    }
}
