<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationHematologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_hematologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hematology_hb')->nullable()->default(null);
            $table->string('hematology_pcv')->nullable()->default(null);
            $table->string('hematology_esr')->nullable()->default(null);
            $table->string('hematology_wbc')->nullable()->default(null);
            $table->string('hematology_neutrophils')->nullable()->default(null);
            $table->string('hematology_lymphocytes')->nullable()->default(null);
            $table->string('hematology_platelet')->nullable()->default(null);
            $table->string('hematology_hematology_blood')->nullable()->default(null);
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
        Schema::drop('investigation_hematologies');
    }
}
