<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_websites', function (Blueprint $table) {
            $table->id();
            $table->string('website_url')->nullable();
            $table->string('website_logo')->nullable();
            $table->string('currency')->nullable();
            $table->string('list_node')->nullable();
            $table->string('search_url_node')->nullable();
            $table->string('product_name_node')->nullable();
            $table->string('product_description_node')->nullable();
            $table->string('product_price_node')->nullable();
            $table->string('product_unit_price_node')->nullable();
            $table->string('product_discount_node')->nullable();
            $table->string('product_image_node')->nullable();
            $table->string('product_link_node')->nullable();

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
        Schema::dropIfExists('search_websites');
    }
}
