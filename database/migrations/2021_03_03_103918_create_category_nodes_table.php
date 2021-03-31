<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_nodes', function (Blueprint $table) {
            $table->id();
            $table->string('main_listing_node')->nullable();
            $table->string('title')->nullable();
            $table->string('brand')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('image')->nullable();
            $table->string('image_url')->nullable();
            $table->string('rating')->nullable();
            $table->string('product_link')->nullable();
            $table->string('slug')->nullable();
            $table->string('last_updated');
            // $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('website_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_nodes');
    }
}
