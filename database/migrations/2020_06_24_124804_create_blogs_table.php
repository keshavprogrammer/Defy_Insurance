<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_id')->index('cate_id');
            $table->string('blog_title', '200')->index('blog_title');
            $table->string('blog_image', '255');            
            $table->text('description');
            $table->string('tags', '500')->index('tags');
            $table->integer('is_publish')->index('is_publish')->default(1);
            $table->integer('status')->index('status')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
