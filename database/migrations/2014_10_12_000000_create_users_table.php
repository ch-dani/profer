<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('is_admin')->default(0);
            $table->string('user_type')->default('individual');
            $table->text('street_address1')->nullable()->default(null);
            $table->text('street_address2')->nullable()->default(null);
            $table->text('country')->nullable()->default(null);
            $table->text('state')->nullable()->default(null);
            $table->text('city')->nullable()->default(null);
            $table->text('zip_code')->nullable()->default(null);
            $table->text('address_phone')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('status')->default(1);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
