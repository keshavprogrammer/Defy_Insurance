<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('fname', '50')->index('fname');
            $table->string('lname', '50')->index('lname');
            $table->string('phone', '20');
            $table->string('email', '100')->index('email');            
            $table->date('birth_date');            
            $table->string('address', '200')->nullable();            
            $table->string('city', '50')->nullable();
            $table->string('state', '50')->nullable();
            $table->string('zip', '10')->nullable();
            $table->string('country', '20')->nullable();
            $table->integer('agenc_id')->index('agenc_id');
            
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
