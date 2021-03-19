<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->tinyInteger('is_brand')->nullable()->default(null);
            $table->tinyInteger('is_subbrand')->nullable()->default(null);
            $table->tinyInteger('is_model')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(null);
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
        Schema::dropIfExists('categories');
    }
}
