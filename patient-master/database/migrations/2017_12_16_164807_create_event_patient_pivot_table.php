<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPatientPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_patient', function (Blueprint $table) {
            $table->unsignedInteger('event_id')->index();
            $table->unsignedInteger('patient_id')->index();
            $table->enum('is_owner', ['Yes', 'No'])->nullable();
            $table->string('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_patient');
    }
}
