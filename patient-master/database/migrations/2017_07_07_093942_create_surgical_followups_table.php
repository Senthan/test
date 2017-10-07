<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgicalFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgical_followups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->text('complain')->nullable()->default(null);
            $table->text('examination')->nullable()->default(null);
            $table->text('investigation')->nullable()->default(null);
            $table->text('management')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->double('post_up_days')->default(0);
            $table->double('post_up_weeks')->default(0);
            $table->double('post_up_months')->default(0);
            $table->date('date')->nullable()->default(null);
            $table->text('motor_examination')->nullable();
            $table->text('sensory')->nullable();
            $table->text('activities_of_daily_living')->nullable();
            $table->text('pain')->nullable();
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
        Schema::drop('surgical_followups');
    }
}
