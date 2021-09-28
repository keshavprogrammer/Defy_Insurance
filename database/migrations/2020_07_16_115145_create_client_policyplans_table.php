<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPolicyplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_policyplans', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->index('client_id');
            $table->integer('policy_type_id')->index('policy_type_id');
            $table->integer('policy_id')->index('policy_id');
            
            $table->float('premium_price', 8, 2);
            $table->date('start_date');
            $table->date('next_premium_date');
            $table->string('holder_name', '200')->index('holder_name');
            $table->string('holder_id_proof_photo', '255');            
            $table->date('holder_birth_date');
            
            $table->string('vehicle_photo', '255');
            $table->string('vehicle_no', '100');
            $table->string('vehicle_engine_no', '100');
            
            $table->string('property_address', '255');
            $table->string('property_photo', '255');
            $table->string('property_document_photo', '255'); 
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
        Schema::dropIfExists('client_policyplans');
    }
}
