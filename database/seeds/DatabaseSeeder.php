<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(WebsiteSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductLinkSeeder::class);
        $this->call(WebsiteSearchSeeder::class);
        $this->call(SingleProductSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(CategoryNodeSeeder::class);
        // $this->call(recipeCategory::class);

    }
}
