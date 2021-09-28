<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_emails', function (Blueprint $table) {
            $table->id();            
            $table->bigInteger('agency_id')->index('agency_id')->default(0);
            $table->bigInteger('creater_id')->index('creater_id')->default(0);
            $table->bigInteger('user_id')->index('user_id')->default(0);
            $table->string('usertype', "4")->index('usertype')->nullable()->comment("l=lead, o=opportunity, c=client");
            $table->bigInteger('template_id')->index('template_id')->default(0);
            $table->string('subject', '50')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_sent')->default(0)->index('is_sent');
            $table->tinyInteger('is_active')->default(1)->index('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing_emails');
    }
}
