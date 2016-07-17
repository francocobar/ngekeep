<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_details', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('task_id_fk');
            $table->bigInteger('assigned_to');
            $table->integer('status')->comment('0: Deliver not read, 1: read, 2: start, 3:finish');
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
        Schema::drop('task_details');
    }
}
