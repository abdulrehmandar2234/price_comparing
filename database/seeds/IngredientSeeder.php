<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [

            [
                'name' => 'Savory Sausage Cups',
                'user_id' => "1",
                'quantity' => "1",
                
            ],
            [
                'name' => 'Yellow Curry Fried',
                'user_id' => "1",
                'quantity' => '1',
                
            ],
            [
                'name' => 'Dry Aging',
                'user_id' => "1",
                'quantity' => "1",
                
            ],
            [
                'name' => 'Tofu Tacos',
                'user_id' => "1",
                'quantity' => "1",
                
            ],
            

        ];
        DB::table('ingredients')->insert($ingredients);
    }
}
