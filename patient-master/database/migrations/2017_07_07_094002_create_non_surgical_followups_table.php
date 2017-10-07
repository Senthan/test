<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonSurgicalFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_surgical_followups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->string('type')->nullable()->default(null);
            $table->text('complain')->nullable()->default(null);
            $table->text('examination')->nullable()->default(null);
            $table->text('investigation')->nullable()->default(null);
            $table->text('management')->nullable()->default(null);
            $table->date('date')->nullable()->default(null);
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
        Schema::drop('non_surgical_followups');
    }
}
