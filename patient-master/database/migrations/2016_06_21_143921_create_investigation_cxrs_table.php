<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationCxrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_cxrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cxr_comment')->nullable()->default(null);
            $table->text('cxr')->nullable()->default(null);
//            $table->integer('cxr_id');
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
        Schema::drop('investigation_cxrs');
    }
}
