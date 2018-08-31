<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->string("date_of_first_entry");
            $table->string("mobgidi_balance");
            $table->string("number");
            $table->string("first_name");
            $table->string("surname");
            $table->string("email_adress");
            $table->string("state");
            $table->string("lg");
            $table->string("sex");
            $table->string("network_index");
            $table->string("network_name");
            $table->string("ra");
            $table->string("pu");
            $table->string("delim");
            $table->string("smartphone");
            $table->string("registered");
            $table->string("vin");
            $table->string("occupation");
            $table->string("employment_status");
            $table->string("date_of_birth");
            $table->string("marital_status");
            $table->string("children");
            $table->string("highest_educational_level");
            $table->string("picture");
            $table->string("vas_status");
            $table->string("vas_service_1");
            $table->string("vas_service_2");
            $table->string("vas_service_3");
            $table->string("dnd_status");
            $table->string("twitter_handle");
            $table->string("facebook");
            $table->string("instagram");
            $table->string("bank");
            $table->string("intrests_1");
            $table->string("intrests_2");
            $table->string("intrests_3");
            $table->string("intrests_4");
            $table->string("sport_followed");
            $table->string("next_of_kin");
            $table->string("health_insurance_status");
            $table->string("pension_account");
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
        Schema::dropIfExists('peoples');
    }
}
