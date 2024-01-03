<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('transaction_id')->unsigned();
                $table->integer('status')->default(0);
                $table->char('ip', 50);
                $table->char('order_type', 50);
                $table->char('user_agent', 50);
                $table->char('payment_gateway', 200);
                $table->double('total');
                $table->double('subtotal');
                $table->double('discount');
                $table->boolean('isPackage')->default(0);
                $table->timestamps();
            });
            
            Schema::table('orders', function (Blueprint $table) {
                $table->foreign('user_id')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
            });  
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }

}
