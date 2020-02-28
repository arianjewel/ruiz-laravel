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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->integer('brand_id')->unsigned();
            $table->string('product_size');
            $table->integer('product_qty');
            $table->float('buy_price',10, 2);
            $table->float('sell_price',10, 2);
            $table->float('offer_price',10, 2)->nullable();
            $table->text('product_desc')->nullable();
            $table->longText('product_image');
            $table->tinyInteger('product_status')->default(1);
            $table->tinyInteger('stock_status')->default(1);

//            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
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
