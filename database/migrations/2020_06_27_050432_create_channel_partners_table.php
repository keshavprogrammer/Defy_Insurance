<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_partners', function (Blueprint $table) {
            $table->id();
            $table->string('photo', '255');
            $table->string('name', '50')->index('name');
            $table->string('phone', '20');
            $table->string('email', '100')->index('email');
            $table->string('password', '200')->index('password');
            $table->string('address', '200')->nullable();            
            $table->string('city', '50')->nullable();
            $table->string('state', '50')->nullable();
            $table->string('zip', '10')->nullable();
            $table->string('country', '20')->nullable();
            $table->integer('agenc_id')->index('agenc_id');
            $table->string('contact_name', '50')->index('contact_name');
            $table->string('contact_email', '100')->index('contact_email');            
            $table->string('contact_phone', '20');            
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
        Schema::dropIfExists('channel_partners');
    }
}
