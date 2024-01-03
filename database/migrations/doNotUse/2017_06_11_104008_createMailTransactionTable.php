<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMailTransactionTable
 */
class CreateMailTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('mail_transaction')) return;

            Schema::create('mail_transaction', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('mail_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->char('role', 50);
                $table->integer('starred');
                $table->integer('is_read');
                $table->integer('tag');
                $table->softDeletes();
                $table->timestamps();
            });

        Schema::table('mail_transaction', function (Blueprint $table) {
            $table->foreign('mail_id')
                ->references('id')->on('mail')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_transaction');
    }
}
