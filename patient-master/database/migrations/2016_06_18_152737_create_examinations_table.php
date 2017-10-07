<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('row')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('col')->nullable()->default(null);
            $table->string('value')->nullable()->default(null);
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('surgical_followup_id')->nullable()->default(null);
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
        Schema::drop('examinations');
    }
}
