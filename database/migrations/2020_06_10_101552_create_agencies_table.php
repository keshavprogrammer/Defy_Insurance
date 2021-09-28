<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 
     */
     
    

    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('logo', '255');
            $table->string('name', '50')->index('name');
            $table->string('email', '100')->index('email');
            $table->string('password', '200')->index('password');
            $table->string('phone', '20');
            $table->string('address', '200')->nullable();            
            $table->string('city', '50')->nullable();
            $table->string('state', '50')->nullable();
            $table->string('zip', '10')->nullable();
            $table->string('country', '20')->nullable();
            $table->string('contact_name', '50')->index('contact_name');
            $table->string('contact_email', '100')->index('contact_email');            
            $table->string('contact_phone', '20');
            $table->integer('theme_id')->index('theme_id');
            $table->integer('status')->index('status')->default(0);
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
        Schema::dropIfExists('agencies');
    }
}
