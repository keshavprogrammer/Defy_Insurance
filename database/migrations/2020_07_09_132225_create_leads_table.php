<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->integer('agenc_id')->index('agenc_id');
            $table->string('fname', '50')->index('fname');
            $table->string('lname', '50')->index('lname');
            $table->string('phone', '20');
            $table->string('email', '100')->index('email');                                   
            $table->string('policyplan_id', '400')->nullable();                        
            $table->integer('mark_opportunity')->index('mark_opportunity')->default(0);
            $table->integer('mark_client')->index('mark_client')->default(0);
            $table->text('notes')->nullable();
            
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
        Schema::dropIfExists('leads');
    }
}
