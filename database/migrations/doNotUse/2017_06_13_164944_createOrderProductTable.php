<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         if (!Schema::hasTable('order_products')) {
            Schema::create('order_products', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('order_id')->unsigned();
                $table->char('model',300)->nullable();
                $table->char('item',300)->nullable();
                $table->integer('product_id');
                $table->integer('quantity');
                $table->char('order_type',50);
                $table->double('price');
                $table->double('subtotal');
                $table->double('total');
                $table->double('discount');
                $table->boolean('is_package');
                $table->timestamps();
            });
            
            Schema::table('order_products', function (Blueprint $table) {
                $table->foreign('order_id')
                        ->references('id')->on('orders')
                        ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
