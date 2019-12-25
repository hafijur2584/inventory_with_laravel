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
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('code');
            $table->string('image');
            $table->bigInteger('buying_price');
            $table->bigInteger('selling_price');
            $table->string('buying_date');
            $table->string('selling_date');
            $table->string('supplier');
            $table->string('godaun');
            $table->bigInteger('discount');
            $table->integer('stock');
            $table->integer('quantity');
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
