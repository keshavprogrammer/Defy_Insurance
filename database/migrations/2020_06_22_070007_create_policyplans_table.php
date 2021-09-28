<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policyplans', function (Blueprint $table) {
            $table->id();
            $table->integer('agenc_id')->index('agenc_id');
            $table->string('logo', '255');
            $table->string('title', '200')->index('name');
            $table->text('description');            
            $table->date('published_date');                                    
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
        Schema::dropIfExists('policyplans');
    }
}
