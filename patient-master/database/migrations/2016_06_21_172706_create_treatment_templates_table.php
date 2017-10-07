<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('surgery_type_id');
            $table->text('en_template')->nullable()->default(null);
            $table->text('ta_template')->nullable()->default(null);
            $table->text('si_template')->nullable()->default(null);
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
        Schema::drop('treatment_templates');
    }
}
