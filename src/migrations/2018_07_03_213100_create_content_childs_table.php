<?php

/**
 * @author @DyanGalih
 * @copyright @2018
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateContentChildsTable
 */
class CreateContentChildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_childs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_parent_id')
                ->unsigned()
                ->nullable(false);
            $table->integer('content_child_id')
                ->nullable(false)
                ->unsigned();
            $table->integer('user_id')
                ->nullable(false)
                ->unsigned();

            
            $table->foreign('content_parent_id')
                ->on('contents')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('content_child_id')
                ->on('contents')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade');
            
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
        Schema::dropIfExists('content_childs');
    }
}