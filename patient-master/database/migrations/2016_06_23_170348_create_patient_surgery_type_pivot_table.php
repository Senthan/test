<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientSurgeryTypePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_surgery_type', function (Blueprint $table) {
            $table->integer('patient_id');
            $table->integer('surgery_type_id');
            $table->string('visit');
            $table->integer('diagnosis_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_surgery_type');
    }
}
