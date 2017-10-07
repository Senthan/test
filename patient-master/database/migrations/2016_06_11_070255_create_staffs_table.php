<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('short_name');
            $table->string('email');
            $table->text('description');
            $table->enum('is_active', ['Yes', 'No'])->default('Yes')->nullable();
            $table->enum('staff_type', ['InHouse', 'Outsourced'])->default('InHouse')->nullable();
            $table->string('profile_image')->nullable()->default(null);
            $table->integer('designation_id')->index();
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
        Schema::drop('staffs');
    }
}
