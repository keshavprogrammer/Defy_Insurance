<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelPartnerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_partner_users', function (Blueprint $table) {
        	$table->id();
            $table->string('photo', '255');
            $table->string('name', '50')->index('name');
            $table->string('phone', '20');
            $table->string('email', '100')->index('email');
            $table->string('password', '200')->index('password');
            $table->date('birth_date'); 
            $table->string('address', '200')->nullable();            
            $table->string('city', '50')->nullable();
            $table->string('state', '50')->nullable();
            $table->string('zip', '10')->nullable();
            $table->string('country', '20')->nullable();
            $table->integer('channel_partner_id')->index('agenc_id');
            $table->date('join_date');            
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
        Schema::dropIfExists('channel_partner_users');
    }
}
