<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_links', function (Blueprint $table) {
            $table->id();
            $table->string('category_link')->unique();
            $table->string('request_type')->default('GET');
            $table->string('scrap_method');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('website_id');
            $table->string('last_updated')->default(Carbon::today());
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
        Schema::dropIfExists('category_links');
    }
}
