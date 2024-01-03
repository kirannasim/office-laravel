<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNetworkTraversingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('network_traversings'))
            Schema::create('network_traversings', function (Blueprint $table) {
                // These columns are needed for Baum's Nested Set implementation to work.
                // Column names may be changed, but they *must* all exist and be modified
                // in the model.
                // Take a look at the model scaffold comments for details.
                // We add indexes on parent_id, lft, rgt columns by default.
                $table->increments('id');
                $table->integer('parent_id')->nullable()->index();
                $table->integer('lft')->nullable()->index();
                $table->integer('rgt')->nullable()->index();
                $table->integer('depth')->nullable();

                // Add needed columns here (f.ex: name, slug, path, etc.)
                // $table->string('name', 255);

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
        if (Schema::hasTable('network_traversings'))
            Schema::drop('network_traversings');
    }
}