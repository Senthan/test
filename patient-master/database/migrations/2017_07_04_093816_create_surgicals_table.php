<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgicals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->string('surgery')->nullable()->default(null);
            $table->string('traneximic')->nullable()->default(null);
            $table->string('methlene')->nullable()->default(null);
            $table->string('operative_notes')->nullable()->default(null);
            $table->string('complication')->nullable()->default(null);
            $table->string('discharge_plan')->nullable()->default(null);
            $table->date('date_of_admission')->nullable()->default(null);
            $table->date('date_of_surgery')->nullable()->default(null);
            $table->date('date_of_discharge')->nullable()->default(null);
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
        Schema::drop('surgicals');
    }
}
