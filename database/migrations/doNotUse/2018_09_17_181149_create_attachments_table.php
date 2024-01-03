<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAttachmentsTable
 */
class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('attachments')) return;

        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 120);
            $table->integer('user_id');
            $table->text('uri');
            $table->char('context', 20);
            $table->char('type', 20);
            $table->char('mime', 50);
            $table->char('extension', 50);
            $table->double('size');
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
        if (!Schema::hasTable('attachments')) return;

        Schema::dropIfExists('attachments');
    }
}