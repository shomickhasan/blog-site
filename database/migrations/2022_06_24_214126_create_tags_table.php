<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('drescreption')->nullable();
            $table->string('slug');
            $table->integer('status')->default(1)->comment('1 for active 0 for inactive');
            $table->timestamps();
        });

        Schema::create('blogpost_tag', function (Blueprint $table) {
            $table->string('blogpost_id');
            $table->integer('tag_id');
             
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('blogpost_tag');
    }
}
