<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationUltraSoundScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_ultra_sound_scans', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('pus_cell_id');
            $table->text('ultra_pus')->nullable()->default(null);
            $table->string('ultra_document')->nullable()->default(null);
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
        Schema::drop('investigation_ultra_sound_scans');
    }
}
