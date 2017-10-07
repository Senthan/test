<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationCtScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_ct_scans', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('brain_id');
            $table->text('ct_scan_brain')->nullable()->default(null);
            $table->text('ct_scan_cervical')->nullable()->default(null);
            $table->text('ct_scan_thorax')->nullable()->default(null);
            $table->text('ct_scan_abdomen')->nullable()->default(null);
            $table->string('ct_scan_document')->nullable()->default(null);
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
        Schema::drop('investigation_ct_scans');
    }
}
