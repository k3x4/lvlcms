<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('node_type_id')->unsigned();
            $table->foreign('node_type_id')->references('id')->on('node_types')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('nodes');
    }

}
