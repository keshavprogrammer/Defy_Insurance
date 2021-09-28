<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sender_id')->index('sender_id')->default(0);
            $table->text('receiver_id')->nullable();
            $table->string('sender_type','25')->nullable();
            $table->string('receiver_type','25')->nullable();
            $table->string('sms_type','25')->nullable();
            $table->text('sms_content')->nullable();
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
        Schema::dropIfExists('sms_histories');
    }
}
