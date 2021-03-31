<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [

            [
                'title' => 'Instant Pot® Meatloaf',
                'description' => "Quick, easy, and delicious meatloaf made in the Instant Pot",
                'image' => '1.png',
                'user_id' => '1',
                'status' => 'publish',
                'category_id' => '1',
                'serving' => '1',
                'preparation_time' => '12:46:16',
                'cooking_time' => '12:46:16',
            ],
            [
                'title' => 'Air Fryer Sweet and Spicy Roasted Carrots',
                'description' => "These tender and roasted carrots cooked in the air fryer ",
                'image' => '2.png',
                'user_id' => '1',
                'status' => 'draft',
                'category_id' => '2',
                'serving' => '1',
                'preparation_time' => '12:46:16',
                'cooking_time' => '12:46:16',
            ],
            [
                'title' => 'Chakchouka (Shakshouka)',
                'description' => "Chakchouka (also called shakshouka) is a Tunisian and Israeli dish of tomatoes",
                'image' => '3.png',
                'user_id' => '1',
                'status' => 'publish',
                'category_id' => '3',
                'serving' => '1',
                'preparation_time' => '12:46:16',
                'cooking_time' => '12:46:16',
            ],
            [
                'title' => 'Alfredo Sauce',
                'description' => "Rich and creamy! I have found that Parmesan cheese doesnt melt well",
                'image' => '4.png',
                'user_id' => '1',
                'status' => 'draft',
                'category_id' => '4',
                'serving' => '1',
                'preparation_time' => '12:46:16',
                'cooking_time' => '12:46:16',
            ],

        ];
        DB::table('blogs')->insert($blogs);

        // Blog::create([
        //     'title' => 'First Post',
        //     'description' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
        //         Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
        //         magnis dis parturient montes, nascetur ridiculus mus.
        //         Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
        //         Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec",
        //     'image' => 'drinks.svg',
        //     'user_id' => '1',
        //     'status' => 'true',
        // ]);
    }
}
