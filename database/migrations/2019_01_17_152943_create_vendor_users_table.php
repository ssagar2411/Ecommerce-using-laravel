<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('fname');
            $table->string('lname');
            $table->string('slug')->unique();
            $table->string('mobile_number');
            $table->string('profile_img')->default('profile.png');
            $table->string('cover_img')->default('cover.png');
            $table->string('secondary_email')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('address')->nullable();
            $table->string('billingaddress')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_users');
    }
}
