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
            $table->id();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('slug')->unique();
            $table->float('new_price')->default(0);
            $table->float('old_price')->nullable()->default(0);
            $table->float('commission')->nullable()->default(0);
            $table->integer('quantity')->default(0);
            $table->tinyInteger('is_delivery')->default(0);
            $table->float('delivery_price')->nullable()->default(0);
            $table->mediumText('image')->nullable()->default('default/product.png');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('author')->nullable();
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('show')->default(0);
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
