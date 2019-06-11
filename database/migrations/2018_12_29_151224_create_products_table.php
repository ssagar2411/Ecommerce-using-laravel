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
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->text('product_description');
            $table->string('product_sku')->nullable();
            $table->integer('stock_status_id');
            $table->text('product_images')->nullable();
            $table->float('mark_price')->nullable();
            $table->float('sell_price')->nullable();
            $table->tinyInteger('promo')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->integer('quantity')->nullable();
            $table->float('weight')->nullable();
            $table->tinyInteger('weight_class_id')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->tinyInteger('dimension_class_id')->nullable();
            $table->integer('vendorid')->default(0);
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
