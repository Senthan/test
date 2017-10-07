<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowUpPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_up_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dose_id');
            $table->integer('drug_id');
            $table->string('route')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->integer('diagnosis_id');
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
        Schema::drop('follow_up_plans');
    }
}
