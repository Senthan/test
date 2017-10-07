<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationBloodTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_blood_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_fbc_hb')->nullable()->default(null);
            $table->string('blood_fbc_plt')->nullable()->default(null);
            $table->string('blood_fbc_sodium')->nullable()->default(null);
            $table->string('blood_fbc_potassium')->nullable()->default(null);
            $table->string('blood_fbc_bu')->nullable()->default(null);
            $table->string('blood_fbc_s_cre')->nullable()->default(null);
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
        Schema::drop('investigation_blood_tests');
    }
}
