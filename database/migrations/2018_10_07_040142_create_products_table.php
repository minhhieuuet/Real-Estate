<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('location')->nullable()->nullable();
            $table->string('type');
            $table->integer('price');
            $table->longText('description')->nullable();
            $table->string('image')->default('default.png');
            $table->string('amenities')->default('');
            $table->string('video')->default('');
            $table->integer('city_code')->nullable();
            $table->integer('district_code')->nullable();
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
        Schema::dropIfExists('products');
    }
}
