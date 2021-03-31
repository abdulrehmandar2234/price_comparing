<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = [

            [
                'banner' => 'images/img1.jpg',
                'image' => 'images/img1.png',
                'title' => 'The New Standard',
                'sub_title' => 'UNDER FAVORABLE SMARTWATCHES',
                'price' => '50',
                'btn_text' => 'Start Buying',
                'link' => '',                
            ],
        
        ];
        DB::table('sliders')->insert($slider);
    }
}
