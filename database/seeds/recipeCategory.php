<?php

use Illuminate\Database\Seeder;

class recipeCategory extends Seeder
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
                'name' => 'Breakfast',
                 
            ],
            [
                'name' => 'Beverages',
                 
            ],
            [
                'name' => 'Main dishes: Beef.',
                
            ],
            [
                'name' => 'Salads',
                 
            ],
            [
                'name' => 'Soups',
              
            ],
           


            
        ];
        DB::table('recipe_categories')->insert($categories);
    }
}
