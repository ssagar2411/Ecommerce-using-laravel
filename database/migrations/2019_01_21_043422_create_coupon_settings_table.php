<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coupon_id')->unsigned();
            $table->integer('discount_type');
            $table->integer('discount_value')->nullable();
            $table->integer('issued_number_coupon')->nullable();
            $table->integer('minimum_order_value')->nullable();
            $table->integer('limit_per_customer')->nullable();
            $table->decimal('discount_percent','5','2')->nullable();
            $table->decimal('maximum_discount_value','10','2')->nullable();
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
        Schema::dropIfExists('coupon_settings');
    }
}
