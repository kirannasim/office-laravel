<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBookmarksTypeTable
 */
class CreateBookmarksTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('bookmark_types')) return;

        Schema::create('bookmark_types', function (Blueprint $table) {
            $table->increments('id');
            $table->text('label');
            $table->char('slug', 50);
            $table->text('description')->nullable();
            $table->char('view_component', 200)->nullable();
            $table->char('icon_font', 50)->nullable();
            $table->text('icon_image')->nullable();
            $table->integer('sort_order')->nullable();
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
        if (Schema::hasTable('bookmark_types'))
            Schema::dropIfExists('bookmark_types');
    }
}
