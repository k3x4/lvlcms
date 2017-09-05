<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_type_id')->unsigned();
            $table->foreign('field_type_id')->references('id')->on('field_types')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('node_id')->unsigned();
            $table->foreign('node_id')->references('id')->on('nodes')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->longtext('value')->nullable();
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
        Schema::dropIfExists('fields');
    }
}
