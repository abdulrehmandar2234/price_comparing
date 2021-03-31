<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('websites');
            $table->string('currency')->nullable();
            $table->string('list_node')->nullable();
            $table->string('product_name_node')->nullable();
            $table->string('product_description_node')->nullable();
            $table->string('product_price_node')->nullable();
            $table->string('product_unit_price_node')->nullable();
            $table->string('product_discount_node')->nullable();
            $table->string('product_image_node')->nullable();
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
        Schema::dropIfExists('single_products');
    }
}
