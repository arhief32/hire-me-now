<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employer_id');
            $table->char('project_title');
            $table->char('project_detail');
            $table->dateTime('project_start_date');
            $table->dateTime('project_end_date');
            $table->bigInteger('project_budget');
            $table->bigInteger('winner_id');
            $table->bigInteger('winner_price');
            $table->boolean('project_paid');
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
        Schema::dropIfExists('project');
    }
}
