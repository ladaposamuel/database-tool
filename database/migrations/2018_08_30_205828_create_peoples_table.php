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
            $table->string('first_entry_date');
            $table->string('mogidi_balance');
            $table->string('number');
            $table->string('firstname');
            $table->string('surname');
            $table->string('email');
            $table->string('state');
            $table->string('LGA');
            $table->string('sex');
            $table->string('network_name');
            $table->string('RA');
            $table->string('PU');
            $table->string('DELIM');
            $table->string('smartphone');
            $table->string('registered');
            $table->string('vin');
            $table->string('occupation');
            $table->string('employment_status');
            $table->string('dob');
            $table->string('marital_status');
            $table->string('children');
            $table->string('picture');
            $table->string('vas_status');
            $table->string('vas_service_1');
            $table->string('vas_service_2');
            $table->string('vas_service_3');
            $table->string('dnd_status');
            $table->string('twitter_handle');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('bank');
            $table->string('intrests_1');
            $table->string('intrests_2');
            $table->string('intrests_3');
            $table->string('sports_followed');
            $table->string('next_of_kin');
            $table->string('health_insurance_status');
            $table->string('pension_account');
            $table->string('h_e_l')->comment('Highest educational level');
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
