<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->unsignedBigInteger('brand_model_id')->nullable();
            $table->unsignedBigInteger('brand')->nullable();
            $table->unsignedBigInteger('model')->nullable();
            $table->text('name')->nullable();
            $table->integer('price')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('weight')->nullable();
            $table->text('sku')->nullable();
            $table->longText('description')->nullable();
            $table->text('price_before_discount')->nullable();
            $table->text('product_availability')->nullable();
            $table->text('shipping_charge')->nullable();
            $table->text('feature')->nullable();
            $table->text('latest')->nullable();
            $table->longText('image1')->nullable();
            $table->longText('image2')->nullable();
            $table->longText('image3')->nullable();
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
