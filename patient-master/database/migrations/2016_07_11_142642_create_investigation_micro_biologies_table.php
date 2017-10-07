<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationMicroBiologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_micro_biologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('micro_biology_crp')->nullable()->default(null);
            $table->string('micro_biology_blood_culture')->nullable()->default(null);
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
        Schema::drop('investigation_micro_biologies');
    }
}
