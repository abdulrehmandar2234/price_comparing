<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'category_name' => 'Alimentação saudável',
                'image' => 'drinks.svg',
            ],
            [
                'category_name' => ' Mercearia',
                'image' => 'FOOD.svg',
            ],
            [
                'category_name' => 'Talho',
                'image' => 'milk.svg',
            ],
            [
                'category_name' => 'Peixaria',
                'image' => 'snow.svg',
            ],
            [
                'category_name' => 'Laticínios',
                'image' => 'cabbage.svg',
            ],
            [
                'category_name' => 'Frescos',
                'image' => 'fish.svg',
            ],
            [
                'category_name' => 'Animals',
                'image' => 'biscits.svg',
            ],
            [
                'category_name' => 'Bolachas e Doces',
                'image' => 'b.svg',
            ],
            [
                'category_name' => 'Shampoo',
                'image' => 'shampoo.png',
            ],

        ];
        DB::table('categories')->insert($categories);
    }
}
