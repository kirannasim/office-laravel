<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateBookmarksTable
 */
class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('bookmarks')) return;

        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sort_order')->nullable();
            $table->integer('type');
            $table->char('entity_id', 200)->nullable();
            $table->char('action', 50);
            $table->text('label')->nullable();
            $table->string('data');
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
        if (Schema::hasTable('bookmarks'))
            Schema::dropIfExists('bookmarks');
    }
}