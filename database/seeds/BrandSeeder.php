<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [

            [
                'brand_name' => 'Coca Cola',
            ],
            
        ];
        DB::table('brands')->insert($brands);
    }
}
