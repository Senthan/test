<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonSurgicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_surgicals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->string('indication_admission')->nullable()->default(null);
            $table->string('investigation')->nullable()->default(null);
            $table->string('management')->nullable()->default(null);
            $table->date('date_of_admission')->nullable()->default(null);
            $table->date('date_of_discharge')->nullable()->default(null);
            $table->enum('traneximic_acid', ['Yes', 'No'])->default('Yes')->nullable();
            $table->enum('methlene_blue', ['Yes', 'No'])->default('Yes')->nullable();
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
        Schema::drop('non_surgicals');
    }
}
