<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationBioChemistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_bio_chemistries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bio_chemistry_sodium')->nullable()->default(null);
            $table->string('bio_chemistry_potassium')->nullable()->default(null);
            $table->string('bio_chemistry_calcium')->nullable()->default(null);
            $table->string('bio_chemistry_blood_urea')->nullable()->default(null);
            $table->string('bio_chemistry_serum_creatinine')->nullable()->default(null);
            $table->string('bio_chemistry_sgpt')->nullable()->default(null);
            $table->string('bio_chemistry_sgot')->nullable()->default(null);
            $table->string('bio_chemistry_total_bilirubin')->nullable()->default(null);
            $table->string('bio_chemistry_direct_bilirubin')->nullable()->default(null);
            $table->string('bio_chemistry_plasma_glucose_fbs')->nullable()->default(null);
            $table->string('bio_chemistry_plasma_glucose_rbs')->nullable()->default(null);
            $table->string('bio_chemistry_plasma_glucose_ppbs')->nullable()->default(null);
            $table->string('bio_chemistry_plasma_glucose_pt')->nullable()->default(null);
            $table->string('bio_chemistry_plasma_glucose_aptt')->nullable()->default(null);
            $table->string('bio_chemistry_total_protein')->nullable()->default(null);
            $table->string('bio_chemistry_serum_albumin')->nullable()->default(null);
            $table->string('bio_chemistry_serum_globulin')->nullable()->default(null);
            $table->string('bio_chemistry_a_g_ratio')->nullable()->default(null);
            $table->string('bio_chemistry_gamma_gT')->nullable()->default(null);
            $table->string('bio_chemistry_alkaline_phosphatase')->nullable()->default(null);
            $table->string('bio_chemistry_toatal_cholesterol')->nullable()->default(null);
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
        Schema::drop('investigation_bio_chemistries');
    }
}
