<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMailTable
 */
class CreateMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          if (Schema::hasTable('mail')) return;

            Schema::create('mail', function (Blueprint $table) {
                $table->increments('id');
                $table->char('subject', 50);
                $table->longText('content');
                $table->integer('reply_to');
                $table->integer('status');
                $table->softdeletes();
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
         Schema::dropIfExists('mail');
    }
}
