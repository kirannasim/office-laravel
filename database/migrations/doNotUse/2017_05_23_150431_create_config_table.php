<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('config')) {
            Schema::create('config', function (Blueprint $table) {
                $table->increments('id');
                $table->char('meta_key', 50);
                $table->text('meta_value');
                $table->char('group', 50);
                $table->char('status', 50);
                $table->integer('serialized')->default(null);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('config');
    }

}
