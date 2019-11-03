<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->string('literal');
            $table->integer('classical')->nullable();
            $table->string('nelson_c')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('stroke_count')->nullable();
            $table->integer('freq')->nullable();
            $table->string('skip')->nullable();
            $table->string('sh_desc')->nullable();
            $table->string('four_corner')->nullable();
            $table->string('deroo')->nullable();
            $table->string('ja_on')->nullable();
            $table->string('ja_kun')->nullable();
            $table->text('meaning')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
